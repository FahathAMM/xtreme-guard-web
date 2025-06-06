@props([
    'categoryId' => '',
    'categoryName' => 'Administrator',

    // 'roleId' => '',
    // 'categoryName' => 'Administrator',

    'numberOfUsers' => '4',
    'color' => 'warning',
    'funName' => 'CategoryModal',
    'per' => 'editRoleModal',
    'perDelete' => 'editRoleModal',
    'item' => [],
])

@php
    // dd($item?->parentCategories?->name);
@endphp
<div class="card  my-1 profile-project-card shadow-none profile-project-{{ $color ?? '' }}">
    <div class="card-body p-4">
        <div class="d-flex">
            <div class="flex-grow-1 text-muted overflow-hidden">
                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">{{ $categoryName ?? '' }}</a>
                </h5>
                <p class="text-muted text-truncate mb-0">{{ $item?->parentCategories?->name ?? 'Parent' }} </p>
            </div>
            <div class="flex-shrink-0 ms-2">
                @canOrRole($per)
                <a href="#" type="button"
                    onclick="{{ $funName }}('{{ $categoryId }}', {{ Js::from($item) }})" class="me-2">
                    <i class="ri-pencil-line"></i>
                </a>
                @endcanOrRole

                {{-- @canOrRole($perDelete) --}}
                <a href="#" delete-url="{{ url('admin/category') }}" delete-item="{{ $categoryName }}"
                    class="delete link-danger" id="{{ $categoryId }}" title="Delete">
                    <i class="ri-delete-bin-5-line"></i>
                </a>
                {{-- @endcanOrRole --}}
            </div>
        </div>

        {{-- <div class="d-flex mt-2">
            <div class="flex-grow-1">
                <div class="d-flex align-items-center gap-2 justify-content-end">
                    <div>

                    </div>
                    <div class="avatar-group text-end">
                        @foreach ([1, 2, 4] as $key => $user)
                            <div class="avatar-group-item">
                                <div class="avatar-xs" title="{{ $user['first_name'] ?? '' }}">

                                </div>
                            </div>
                        @endforeach
                        <div class="avatar-group-item">
                            <div class="avatar-xs">
                                <div class="avatar-title rounded-circle bg-light text-primary">
                                    +{{ abs($moreUsers) ?? '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- end card body -->
</div>
