@props([
    'files' => 'files',
])

<div>
    <table class="tf-table-page-cart">
        <tbody>
            @foreach ($files as $file)
                <tr class="tf-cart-item1 file-delete">
                    <td class="tf-cart-item_product">
                        <i class="fas fa-file-pdf me-2 fs-2 text-danger"></i>
                        {{ $file->file_name }}
                    </td>

                    <td class="remove-cart text-end">
                        <span class="fs-12">
                            <small style=" font-size: 10px; ">Last updated:</small>
                            {{ date('d M Y', strtotime($file->created_at)) }}
                        </span>
                        <a href="{{ asset('storage/' . $file->path, []) }}" download
                            class="d-flex justify-content-end  link-danger link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">
                            <i class="fas fa-download me-2"></i>
                            <span>Download</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
