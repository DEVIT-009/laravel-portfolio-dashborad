@php
    $id = $employee->id;
@endphp

<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('Backend.employee.index') }}">
                                <i class="fas fa-arrow-left"></i> Employee
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Editing</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="card-title text-white">Edit Employee</h3>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('Backend.employee.update', $id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- ================= DEPARTMENT + POSITION ================= --}}
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select name="department_id"
                                                    id="departmentSelect"
                                                    class="form-control select2 @error('department_id') is-invalid @enderror">

                                                <option disabled>*** Select Department ***</option>

                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}"
                                                        {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('department_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Position</label>
                                            <select name="position_id"
                                                    id="positionSelect"
                                                    class="form-control select2 @error('position_id') is-invalid @enderror">
                                                <option disabled>*** Select Position ***</option>
                                            </select>
                                            @error('position_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <hr class="border-2 border-dark">

                                {{-- ================= BASIC INFO ================= --}}
                                <div class="row">

                                    <!-- Employee Code -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Employee Code</label>
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $employee->code }}"
                                                   readonly
                                                   style="background-color:#e9ecef;">
                                        </div>
                                    </div>

                                    <!-- Full Name -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Full Name *</label>
                                            <input type="text"
                                                   name="full_name"
                                                   class="form-control @error('full_name') is-invalid @enderror"
                                                   value="{{ old('full_name', $employee->full_name) }}">
                                            @error('full_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender *</label>
                                            <select name="gender"
                                                    class="form-control @error('gender') is-invalid @enderror">
                                                <option disabled>*** Select Gender ***</option>
                                                <option value="male"
                                                    {{ old('gender', $employee->gender)=='male'?'selected':'' }}>Male</option>
                                                <option value="female"
                                                    {{ old('gender', $employee->gender)=='female'?'selected':'' }}>Female</option>
                                                <option value="other"
                                                    {{ old('gender', $employee->gender)=='other'?'selected':'' }}>Other</option>
                                            </select>
                                            @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- DOB -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth *</label>
                                            <input type="date"
                                                   name="dob"
                                                   class="form-control @error('dob') is-invalid @enderror"
                                                   value="{{ old('dob', $employee->dob?->format('Y-m-d')) }}"

                                            >

                                            @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- National ID -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>National ID *</label>
                                            <input type="text"
                                                   name="national_id"
                                                   class="form-control @error('national_id') is-invalid @enderror"
                                                   value="{{ old('national_id', $employee->national_id) }}">

                                            @error('national_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input type="email"
                                                   name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email', $employee->email) }}">
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
                                                       class="form-control @error('phone_number') is-invalid @enderror"
                                                       value="{{ old('phone_number', $employee->phone_number) }}">
                                            </div>
                                            @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Hire Date -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Hire Date *</label>
                                            <input type="date"
                                                   name="hire_date"
                                                   class="form-control @error('hire_date') is-invalid @enderror"
                                                   value="{{ old('hire_date', $employee->hire_date?->format('Y-m-d')) }}"

                                            >


                                            @error('hire_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Employee Type -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Employee Type *</label>
                                            <select name="employee_type"
                                                    class="form-control @error('employee_type') is-invalid @enderror">
                                                <option value="full_time"
                                                    {{ old('employee_type', $employee->employee_type)=='full_time'?'selected':'' }}>Full Time</option>
                                                <option value="part_time"
                                                    {{ old('employee_type', $employee->employee_type)=='part_time'?'selected':'' }}>Part Time</option>
                                                <option value="contract"
                                                    {{ old('employee_type', $employee->employee_type)=='contract'?'selected':'' }}>Contract</option>
                                            </select>
                                            @error('employee_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status *</label>
                                            <select name="status"
                                                    class="form-control @error('status') is-invalid @enderror">
                                                <option value="active"
                                                    {{ old('status', $employee->status)=='active'?'selected':'' }}>Active</option>
                                                <option value="inactive"
                                                    {{ old('status', $employee->status)=='inactive'?'selected':'' }}>Inactive</option>
                                                <option value="terminated"
                                                    {{ old('status', $employee->status)=='terminated'?'selected':'' }}>Terminated</option>
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
                                                      rows="3"
                                                      class="form-control">{{ old('address', $employee->address) }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Profile Preview -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Profile Picture</label>

                                            @if($employee->profile)
                                                <div class="mb-2">
                                                    <img src="{{ asset('storage/'.$employee->profile) }}"
                                                         width="120"
                                                         class="img-thumbnail">
                                                </div>
                                            @endif

                                            <input type="file"
                                                   name="profile"
                                                   class="form-control-file"
                                                   accept="image/*">
                                        </div>
                                    </div>

                                </div>

                                {{-- ================= BUTTONS ================= --}}
                                <div class="form-group">
                                    <div class="btn-group">
                                        <button type="submit"
                                                name="action"
                                                value="save_close"
                                                class="btn btn-primary px-4">
                                            Save & Close
                                        </button>
                                        <button type="submit"
                                                name="action"
                                                value="save"
                                                class="btn btn-outline-primary px-4">
                                            Save
                                        </button>
                                    </div>
                                    <button type="reset" class="btn btn-default">
                                        Cancel
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {

            $('.select2').select2();

            function loadPositions(departmentId, selectedPositionId = null) {

                if (!departmentId) return;

                fetch(`/admin/v1/positions/by-department/${departmentId}`)
                    .then(response => response.json())
                    .then(data => {

                        $('#positionSelect').empty();
                        $('#positionSelect').append('<option disabled>*** Select Position ***</option>');

                        data.forEach(position => {

                            let selected = selectedPositionId == position.id ? 'selected' : '';

                            $('#positionSelect').append(
                                `<option value="${position.id}" ${selected}>${position.title}</option>`
                            );
                        });

                        $('#positionSelect').trigger('change');
                    });
            }

            const departmentId = "{{ old('department_id', $employee->department_id) }}";
            const positionId = "{{ old('position_id', $employee->position_id) }}";

            loadPositions(departmentId, positionId);

            $('#departmentSelect').on('change', function () {
                loadPositions($(this).val());
            });

        });
    </script>
@endpush
