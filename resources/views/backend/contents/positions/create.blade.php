<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Position</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('backend.position.index') }}">
                                <i class="fas fa-arrow-left"></i> Position
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Create</li>
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
                        <!-- Card Header -->
                        <div class="card-header bg-dark">
                            <h3 class="card-title text-white">Create Form</h3>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <form action="{{ route('backend.position.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <!-- Position ID -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Position ID:</label>
                                            <input type="text"
                                                   class="form-control"
                                                   value="Auto-Generate"
                                                   readonly
                                                   style="background-color: #e9ecef;">
                                        </div>
                                    </div>

                                    <!-- Department -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Department <span class="text-danger">*</span>
                                            </label>
                                            <select name="department_id"
                                                    class="form-control @error('department_id') is-invalid @enderror">
                                                <option value="">-- Select Department --</option>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}"
                                                        {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('department_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Title -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Position Title <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   name="title"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title') }}"
                                                   placeholder="e.g. Software Engineer">
                                            @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Level -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Level</label>
                                            <input type="text"
                                                   name="level"
                                                   class="form-control @error('level') is-invalid @enderror"
                                                   value="{{ old('level') }}"
                                                   placeholder="Junior / Senior / Lead">
                                            @error('level')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description"
                                              rows="4"
                                              class="form-control @error('description') is-invalid @enderror"
                                              placeholder="Position description...">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Managerial -->
                                <div class="form-group">
                                    <label>Managerial Position</label>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="is_managerial"
                                               id="managerial_yes"
                                               value="1"
                                            {{ old('is_managerial') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="managerial_yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="is_managerial"
                                               id="managerial_no"
                                               value="0"
                                            {{ old('is_managerial', '0') == '0' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="managerial_no">
                                            No
                                        </label>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status"
                                               id="status_active"
                                               value="1"
                                            {{ old('status', '1') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="status"
                                               id="status_inactive"
                                               value="0"
                                            {{ old('status') == '0' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_inactive">
                                            Inactive
                                        </label>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="form-group">
                                    <div class="btn-group" role="group">
                                        <button type="submit"
                                                name="action"
                                                value="create_close"
                                                class="btn btn-primary px-4">
                                            Create &amp; Close
                                        </button>
                                        <button type="submit"
                                                name="action"
                                                value="create"
                                                class="btn btn-outline-primary px-4">
                                            Create
                                        </button>
                                    </div>
                                    <button type="reset" class="btn btn-default">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
