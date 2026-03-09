<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('backend.employee.index') }}">
                                <i class="fas fa-arrow-left"></i> Employee
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
                {{--                Department and Position--}}
                <div class="col-12">
                    <div class="card">
                        <!-- Card Header -->
                        <div class="card-header bg-dark">
                            <h3 class="card-title text-white">Create Employee</h3>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <form action="{{ route('backend.employee.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                {{-- Departments and Positions --}}
                                <div class="row">

                                    <!-- Department -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select name="department_id" id="departmentSelect"
                                                    class="form-control select2" style="width: 100%;">
                                                <option disabled selected>*** Select Department ***</option>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}">
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Position -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Position</label>
                                            <select name="position_id" id="positionSelect" class="form-control select2"
                                                    style="width: 100%;">
                                                <option disabled selected>*** Select Position ***</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="border-2 border-dark">

                                {{--                                info employee --}}
                                <div class="row">

                                    <!-- Employee Code -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Employee Code:</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="code"
                                                   value="{{ $code }}"
                                                   readonly
                                                   style="background-color:#e9ecef;">
                                        </div>
                                    </div>

                                    <!-- Full Name -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <input type="text"
                                                   name="full_name"
                                                   class="form-control @error('full_name') is-invalid @enderror"
                                                   value="{{ old('full_name') }}"
                                                   placeholder="Enter full name">
                                            @error('full_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender <span class="text-danger">*</span></label>
                                            <select name="gender"
                                                    class="form-control @error('gender') is-invalid @enderror">
                                                <option disabled {{ old('gender') ? '' : 'selected' }}>*** Select Gender ***</option>
                                                <option value="male" {{ old('gender')=='male'?'selected':'' }}>Male</option>
                                                <option value="female" {{ old('gender')=='female'?'selected':'' }}>Female</option>
                                                <option value="other" {{ old('gender')=='other'?'selected':'' }}>Other</option>
                                            </select>
                                            @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date"
                                                   name="dob"
                                                   class="form-control @error('dob') is-invalid @enderror"
                                                   value="{{ old('dob') }}">
                                            @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- National ID -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>National ID <span class="text-danger">*</span></label>
                                            <input type="text"
                                                   name="national_id"
                                                   class="form-control @error('national_id') is-invalid @enderror"
                                                   value="{{ old('national_id') }}">
                                            @error('national_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email"
                                                   name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email') }}">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">+855</span>
                                                </div>
                                                <input type="text"
                                                       name="phone_number"
                                                       value="{{ old('phone_number') }}"
                                                       class="form-control @error('phone_number') is-invalid @enderror"
                                                       data-inputmask='"mask": "999-999-9999"'
                                                       data-mask>
                                            </div>
                                            @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Hire Date -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Hire Date <span class="text-danger">*</span></label>
                                            <input type="date"
                                                   name="hire_date"
                                                   class="form-control @error('hire_date') is-invalid @enderror"
                                                   value="{{ old('hire_date') }}">
                                            @error('hire_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Employee Type -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Employee Type <span class="text-danger">*</span></label>
                                            <select name="employee_type"
                                                    class="form-control @error('employee_type') is-invalid @enderror">
                                                <option disabled selected>*** Select Employee Type ***</option>
                                                <option value="full_time" {{ old('employee_type')=='full_time'?'selected':'' }}>Full Time</option>
                                                <option value="part_time" {{ old('employee_type')=='part_time'?'selected':'' }}>Part Time</option>
                                                <option value="contract" {{ old('employee_type')=='contract'?'selected':'' }}>Contract</option>
                                            </select>
                                            @error('employee_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status <span class="text-danger">*</span></label>
                                            <select name="status"
                                                    class="form-control @error('status') is-invalid @enderror">
                                                <option disabled selected>*** Select Status ***</option>
                                                <option value="active" {{ old('status')=='active'?'selected':'' }}>Active</option>
                                                <option value="inactive" {{ old('status')=='inactive'?'selected':'' }}>Inactive</option>
                                                <option value="terminated" {{ old('status')=='terminated'?'selected':'' }}>Terminated</option>
                                            </select>
                                            @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address"
                                                      class="form-control @error('address') is-invalid @enderror"
                                                      rows="3">{{ old('address') }}</textarea>
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Profile -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Profile Picture</label>
                                            <input type="file"
                                                   name="profile"
                                                   class="form-control-file @error('profile') is-invalid @enderror"
                                                   accept="image/*">
                                            @error('profile')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <!-- Actions -->
                                    <div class="form-group">
                                        <div class="btn-group" role="group">
                                            <button type="submit"
                                                    name="action"
                                                    value="create_close"
                                                    class="btn btn-primary px-4">
                                                Create & Close
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
@push('scripts')
    <script>
        $(document).ready(function () {
            // Initialize Select2 first
            $('.select2').select2();

            // Function to load positions
            function loadPositions(departmentId) {
                if (!departmentId) return;

                fetch(`/admin/v1/positions/by-department/${departmentId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Clear positions dropdown
                        $('#positionSelect').empty();
                        $('#positionSelect').append('<option disabled selected>*** Select Position ***</option>');

                        // Add new options
                        data.forEach(position => {
                            $('#positionSelect').append(
                                `<option value="${position.id}">${position.title}</option>`
                            );
                        });

                        // Refresh Select2
                        $('#positionSelect').trigger('change');
                    })
                    .catch(err => console.error('Fetch error:', err));
            }

            // Set first department as default and load positions
            const firstDepartmentId = $('#departmentSelect option:not([disabled])').first().val();
            if (firstDepartmentId) {
                $('#departmentSelect').val(firstDepartmentId).trigger('change');
                loadPositions(firstDepartmentId);
            }

            // Handle department change
            $('#departmentSelect').on('change', function () {
                const departmentId = $(this).val();
                loadPositions(departmentId);
            });
        });
    </script>
@endpush
