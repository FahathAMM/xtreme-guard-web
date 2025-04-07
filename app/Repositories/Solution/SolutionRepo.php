<?php

namespace App\Repositories\Solution;

use Illuminate\Support\Facades\Log;
use App\Models\Product\ProductImage;
use App\Models\Solution\Solution;
use App\Repositories\BaseRepository;

class SolutionRepo extends BaseRepository
{
    protected $model;

    public function __construct(Solution $model)
    {
        $this->model = $model;
    }

    public function __call($method, $parameters)
    {
        // Forward calls to the model instance
        $isExisit = $this->model->$method(...$parameters);

        if ($isExisit) {
            return $isExisit;
        }

        throw new \BadMethodCallException("Method {$method} does not exist on the model.");
    }

    public function createSolution($request)
    {
        $attrValues = $request->value;
        $attr =  $request->attribute;
        $attachedmentName =  $request->attachment_attribute;

        $data = $request->validated();

        $data['tags'] = explode(',', $request->tags);

        $created = $this->model->create($data);

        if ($created) {

            if ($request->hasFile('banner_img')) {
                $this->model->imageUpload('/solution', $created, $request->file('banner_img'), 'banner_img');
            }

            // foreach ($attrValues as $key => $valData) {
            //     $created->attributes()->create([
            //         'key' => $attr[$key],
            //         'value' => $valData,
            //     ]);
            // }

            // if ($request->hasFile('attachment_value')) {
            //     foreach ($request->file('attachment_value') as $key => $attachment) {
            //         $path = $attachment->store('attachment', 'public');
            //         Log::info($path);
            //         $created->files()->create([
            //             'file_name' => $attachedmentName[$key],
            //             'desc' => $attachedmentName[$key],
            //             'path' => $path,
            //         ]);
            //     }
            // }

            return $created;
        }
        return false;
    }

    public function updateSolution($request, $model)
    {
        $attributes = $request->attachment_attribute;
        $values = $request->attachment_value;

        $attachments = [];

        // Handle file uploads for attachment_value
        $paths = [];
        if ($request->hasFile('attachment_value')) {
            foreach ($request->file('attachment_value') as $key => $attachment) {
                $paths[] = $attachment->store('solutionattachment', 'public');
            }
        } else {
            // If no files uploaded, assume values are directly passed (like text or data)
            $paths = $values;
        }

        // Combine attributes and values (or file paths) into a single key-value JSON
        foreach ($attributes as $index => $key) {
            $attachments[$key] = $paths[$index] ?? null;
        }

        $data = $request->validated();

        // Convert tags string to array if needed
        $data['tags'] = explode(',', $request->tags);

        // Add attachments JSON to the data
        $data['file'] = array_merge($model->file ?? [], $attachments);

        $updated = $model->update($data);

        if ($updated) {
            // Handle banner image
            if ($request->hasFile('banner_img')) {
                $this->model->imageUpload('/solution', $model, $request->file('banner_img'), 'banner_img');
            }

            return $updated;
        }

        return false;
    }


    // public function updateSolution($request, $model)
    // {
    //     $attributes = $request->attachment_attribute;
    //     $values = $request->attachment_value;

    //     $attachments = [];

    //     // foreach ($attributes as $index => $key) {
    //     //     $attachments[$key] = $values[$index] ?? null;
    //     // }

    //     // return $attachments;

    //     $data = $request->validated();

    //     $data['tags'] = explode(',', $request->tags);
    //     // $data['file'] = $attributes;

    //     $updated = $model->update($data);

    //     if ($updated) {

    //         if ($request->hasFile('banner_img')) {
    //             $this->model->imageUpload('/solution', $model, $request->file('banner_img'), 'banner_img');
    //         }

    //         $path = [];
    //         if ($request->hasFile('attachment_value')) {
    //             foreach ($request->file('attachment_value') as $key => $attachment) {
    //                 $path[] = $attachment->store('solutionattachment', 'public');
    //             }
    //         }

    //         return $updated;
    //     }
    //     return false;
    // }





    public function updateCategory($request, $model)
    {
        $updated = $model->update($request->validated());
        if ($updated) {
            return $updated;
        }
        return false;
    }

    public function getAccessPermission(): array
    {
        return [
            'isView' => false,
            'isEdit' => true,
            'isDelete' =>  false,
            'isPrint' => false
        ];
    }
}
