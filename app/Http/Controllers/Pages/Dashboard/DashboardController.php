<?php

namespace App\Http\Controllers\Pages\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\TrackingOrderByJob;
use App\Mail\LowStockNotifyMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Mail\OrderReturnCreatedMail;
use App\Repositories\Orders\PickupRepo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProductInquiryNotification;
use App\Notifications\schedulerFailedNotification;
use App\Models\Administration\UserLoginActivityLog;
use App\Http\Controllers\Pages\Order\InvoiceController;
use App\Http\Controllers\Pages\Application\MailController;
use App\Http\Controllers\Pages\Order\AutomationController;
use App\Http\Controllers\Pages\Administration\SettingController;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    protected $modelName = 'Dashboard';
    protected $routeName = 'permission.index';
    protected $isDestroyingAllowed;

    protected $model;
    protected $repo;

    public function __construct()
    {

        $this->checkRememberMe();
    }

    public function index(Request $request)
    {
        $userLogs = $this->getUserActivites();

        logActivity('Dashboard', 'Dashboard', 'View');


        // ----------
        // Mail::raw('Test message', function ($message) {
        //     $message->to('fahath.mirnah@gmail.com')
        //         ->subject('Testing SMTP');
        // });
        // return;
        // ----------

        // // ariffakil@gmail.com
        // $hh = Notification::route('mail', 'fahath.mirnah@gmail.com')
        //     // Notification::route('mail', 'fahath.mirnah@gmail.com')
        //     ->notify(new ProductInquiryNotification($request));

        // Log::info('test mail');


        // Notification::route('mail', 'fahath.mirnah@gmail.com')
        //     ->notify(new ProductInquiryNotification($request));


        // return   $hh;

        // return  $groupedVisits = DB::table('visits')
        //     ->select('ip', DB::raw('DATE(visited_at) as visit_date'), DB::raw('COUNT(*) as visit_count'))
        //     ->whereDate('visited_at', Carbon::today())
        //     ->groupBy('ip', DB::raw('DATE(visited_at)'))
        //     ->get();

        $countData = DB::table('products')
            ->selectRaw("
            'Total Products' as title,
            COUNT(*) as value,
            'fas fa-users' as icon,
            'View Total Products' as `linkText`,
            'products' as `link`,
            '+100' as percentage,
            'bg-success-subtle' as bgClass,
            'success' as trend
        ")
            ->unionAll(
                DB::table('categories')
                    ->selectRaw("
                    'Total Categories' as title,
                    COUNT(*) as value,
                    'fas fa-th-large' as icon,
                    'View Categories' as `linkText`,
                    'category' as `link`,
                    '+100' as percentage,
                    'bg-success-subtle' as bgClass,
                    'success' as trend
                ")
            )
            ->unionAll(
                DB::table('product_attachments')
                    ->selectRaw("
                    'Total Files' as title,
                    COUNT(*) as value,
                    'fas fa-users' as icon,
                    'View Total Files' as `linkText`,
                    '#' as `link`,
                    '+100' as percentage,
                    'bg-success-subtle' as bgClass,
                    'success' as trend
                ")
            )
            ->unionAll(
                DB::table('users')
                    ->selectRaw("
                    'Total Users' as title,
                    COUNT(*) as value,
                    'fas fa-users' as icon,
                    'View Total Files' as `linkText`,
                    '#' as `link`,
                    '+100' as percentage,
                    'bg-success-subtle' as bgClass,
                    'success' as trend
                ")
            )
            ->unionAll(
                DB::table('users')
                    ->selectRaw("
                    'Total Users' as title,
                    COUNT(*) as value,
                    'fas fa-users' as icon,
                    'View Total Files' as `linkText`,
                    '#' as `link`,
                    '+100' as percentage,
                    'bg-success-subtle' as bgClass,
                    'success' as trend
                ")
            )
            ->unionAll(
                DB::table('visits')
                    ->selectRaw("
                    'Today Visitors' as title,
                     COUNT(DISTINCT ip) as value,
                    'fas fa-users' as icon,
                    'View Today Visitors' as linkText,
                    '#' as link,
                    '+100%' as percentage,
                    'bg-info-subtle' as bgClass,
                    'info' as trend
                ")->whereDate('visited_at', Carbon::today())
            )
            ->get();

        // return $countData;

        // return $model = $model->whereDate('created_at', now())->get();
        return view('pages/dashboard/index', [
            'title' => $this->modelName,
            'data' => $countData ?? [],
            'orders' => $orders ?? [],
            'userLogs' => $userLogs,
            // 'order' =>  $this->repo->getOrdeById(1000000058),
            'lowStock' =>   []
        ]);
    }

    private function getUserActivites()
    {
        $logs = DB::table('user_logs')
            ->where('log_action', '!=', 'View')
            ->orderBy('created_at', 'desc')
            ->take(100)
            ->join('users as ut', 'ut.id', '=', 'user_logs.user_id')
            ->get([
                'user_logs.user_id',
                'user_logs.user_name',
                'user_logs.form_name',
                'user_logs.form_record_id',
                'user_logs.log_action',
                'user_logs.created_at',
                'ut.img' // Image field from users
            ]);

        // Manually apply the image logic
        $defaultImage = 'https://hancockogundiyapartners.com/wp-content/uploads/2019/07/dummy-profile-pic-300x300.jpg';

        $userLogs = $logs->transform(function ($log) use ($defaultImage) {
            $log->img = !empty($log->img) && Storage::exists('public/' . $log->img)
                ? asset('storage/' . $log->img)
                : $defaultImage;
            return $log;
        });

        return $userLogs;
    }

    private function loggedHistoryQry()
    {
        return $loggedUserModel = UserLoginActivityLog::select([
            'user_login_activity_logs.id', // Explicitly mention the table
            'user_login_activity_logs.user_id',
            'action as login_status',
            'ip_address',
            'device',
            'os',
            'browser',
            'login_time',
            DB::raw("IFNULL(logout_time, 'Currently Logged In') AS logout_time"), // Handle NULL logout_time
            'status',
            DB::raw(
                "CONCAT(
                '<div class=\"d-flex align-items-center mb-3\">',
                '<div class=\"flex-shrink-0 avatar-sm\">',
                '<div class=\"avatar-title bg-light text-primary rounded-3\" style=\"font-size:30px\">',
                CASE
                    WHEN device = 'Mobile' THEN '<i class=\"ri-smartphone-line\"></i>'
                    WHEN device = 'Tablet' THEN '<i class=\"ri-tablet-line\"></i>'
                    WHEN device = 'Desktop' THEN '<i class=\"ri-computer-line\"></i>'
                    ELSE '<i class=\"ri-question-line\"></i>'
                END,
                '</div>',
                '</div>',
                '<div class=\"flex-grow-1 ms-3\">',
                '<h6>', device, '</h6>',
                '<p class=\"text-muted mb-0\">',
                'User <b>', ut.username , '</b> logged in successfully using <b>', IFNULL(browser, ''), '</b> on a running <b>', os,
                '</b><b> '  '</b> from the IP address <b>', ip_address, '</b>',
                ' and ',
                CASE
                    WHEN logout_time IS NOT NULL THEN CONCAT('logged out on <b>', DATE_FORMAT(logout_time, '%M %d at %l:%i %p'), '</b>')
                    ELSE '<b>is currently logged in</b>'
                END,
                '</p>',
                '</div>',
                '</div>'
            ) AS formatted_message"
            )
        ])
            ->orderByDesc('login_time')
            ->join('users as ut', 'ut.id', '=', 'user_login_activity_logs.user_id')
            ->get();
    }

    private function testvalue()
    {
        // return   $newPost = $order->replicate();
        // return $order;

        // return (new AutomationController)->importStockFromRoutePro();

        // return  $resp =  (new AutomationController)->exportBySingleOrderByCron();

        // GenerateInvoiceNumberJob::dispatch(['key' => 'value']);
        // TrackingOrderByJob::dispatch(1);
        // $value = $request->ref ?? 50362361976;
        // TrackingOrderByJob::dispatch($value);

        // TrackingOrderByJob::dispatch(503629800212);
        // TrackingOrderByJob::dispatch(503629800212)->delay(now()->addMinutes(2));
        // return config('cpanel.clientInfo');

        // app(InvoiceController::class)->generatePDF('2000000019');
        // return app(AutomationController::class)->importStockFromRoutePro();
        // return app(AutomationController::class)->uploadWarehouseStockData();

        // return config('cpanel.aramexValidCities');
    }
}
