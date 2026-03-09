@php
    $id = $department->id;
    $name = $department->name;
    $description = $department->description;
    $status = $department->status;
@endphp

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit-Department</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="fas fa-arrow-left"></i> Department
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Editing</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="card-title text-white">Edit Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('backend.department.update', $id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id">Department ID:</label>
                                            <input type="text"
                                                class="form-control"
                                                id="id"
                                                name="id"
                                                value="{{ $id ?? '' }}"
                                                readonly
                                                style="background-color: #e9ecef;">
                                            @error('id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">
                                                Department Name: <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="name"
                                                name="name"
                                                value="{{ old('name', $name ?? '') }}"
                                                placeholder="Aa"
                                                required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              id="description"
                                              name="description"
                                              rows="4"
                                              placeholder="Aa">{{ old('description', $description ?? '') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Status:</label>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status"
                                               id="status_active"
                                               value="active"
                                               {{ old('status', $status ?? 'active') == 'active' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status"
                                               id="status_inactive"
                                               value="inactive"
                                               {{ old('status', $status ?? 'active') == 'inactive' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_inactive">
                                            Inactive
                                        </label>
                                    </div>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="btn-group" role="group" aria-label="Save actions">
                                        <button type="submit" name="action" value="save_close" class="btn btn-primary px-4">
                                            Save &amp; Close
                                        </button>
                                        <button type="submit" name="action" value="save" class="btn btn-outline-primary px-4">
                                            Save
                                        </button>
                                    </div>
                                    <a href="#" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
