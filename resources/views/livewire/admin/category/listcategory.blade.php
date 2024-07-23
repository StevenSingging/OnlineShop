<div>
    @livewire('partials.navbar')
    @livewire('partials.menubar')
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Categories
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-category">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Create new category
                            </a>
                        </div>
                    </div>
                    <!-- Page body -->
                    <div class="page-body">
                        <div class="container-xl">
                            @if(session()->has('message'))
                            <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                                    </div>
                                    <div>
                                        {{ session('message') }}
                                    </div>
                                </div>
                                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                            </div>
                            @endif
                            <div class="modal modal-blur fade" id="modal-category" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <form wire:submit.prevent='create'>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">New category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" id="name" wire:model.defer="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your report name">
                                                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Slug</label>
                                                            <input type="text" id="slug" wire:model.defer="slug" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <div class="form-label">Image</div>
                                                            <input wire:model.defer="image" type="file" class="form-control  @error('image') is-invalid @enderror">
                                                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                                    Cancel
                                                </a>
                                                <button type="submit" class="btn btn-primary ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M12 5l0 14" />
                                                        <path d="M5 12l14 0" />
                                                    </svg>
                                                    Create
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="modal modal-blur fade" id="modal-edit-category" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <form wire:submit.prevent="update">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" wire:model.defer="name" id="name1" class="form-control @error('name') is-invalid @enderror" placeholder="Category name">
                                                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Slug</label>
                                                            <input type="text" wire:model.defer="slug" id="slug1" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <div class="form-label">Image</div>
                                                            <input wire:model.defer="newImage" type="file" class="form-control @error('newImage') is-invalid @enderror">
                                                            @error('newImage')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                                    Cancel
                                                </a>
                                                <button type="submit" class="btn btn-primary ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24H0z" fill="none" />
                                                        <path d="M12 5l0 14" />
                                                        <path d="M5 12l14 0" />
                                                    </svg>
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body border-bottom py-3">
                                    <div class="d-flex">
                                        <div class="text-secondary">
                                            Show
                                            <div class="mx-2 d-inline-block">
                                                <select class="form-select" wire:model.live='perpage'>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                            entries
                                        </div>
                                        <div class="ms-auto text-secondary">
                                            Search:
                                            <div class="ms-2 d-inline-block">
                                                <input wire:model.live.debounce.300ms='search' type="text" class="form-control form-control-sm" aria-label="Search invoice">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-1">No.</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no=1; @endphp
                                            @foreach($categories as $category)
                                            <tr>
                                                <td scope="row"><?php echo e($no++) + (($categories->currentPage() - 1) * $categories->perPage()) ?></td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td><img src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}" srcset="" width="35px"></td>
                                                <td>
                                                    <button type="button" wire:click="edit({{$category->id}})" class="btn btn-md btn-warning d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-edit-category">Edit</button>
                                                    <button type="button" wire:click="delete({{$category->id}})" class="btn btn-md btn-danger d-none d-sm-inline-block">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    <ul class="pagination m-0 ms-auto">
                                        <li class="page-item">
                                            {{ $categories->links('vendor.pagination.bootstrap-4') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handler for the first modal
            $('#modal-category').on('input', '#name', function(e) {
                let nameValue = $(this).val();
                if (nameValue === '') {
                    $('#slug').val('');
                } else {
                    $.get('{{ route('admin.category.checkslug') }}', {
                                'name': nameValue
                            })
                        .done(function(data) {
                            $('#slug').val(data.slug);
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            console.error('Error:', jqXHR.responseText);
                        });
                }
            });

            // Handler for the second modal
            $('#modal-edit-category').on('input', '#name1', function(e) {
                let nameValue = $(this).val();
                if (nameValue === '') {
                    $('#slug1').val('');
                } else {
                    $.get('{{ route('admin.category.checkslug') }}', {
                                'name': nameValue
                            })
                        .done(function(data) {
                            $('#slug1').val(data.slug);
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            console.error('Error:', jqXHR.responseText);
                        });
                }
            });
        });
    </script>
</div>