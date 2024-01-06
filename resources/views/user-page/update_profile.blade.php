
@extends('user-page.layouts.user_main')

@section('content-pages')

<hr>
<form action="/update-profile/{{ auth('participant')->user()->number }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="p-3 row rounded-2 shadow mx-2">
        <div class="col-lg-3 col-md-3 col-sm-3 mt-2">
            <label for="image">&nbsp; </label> 
            <div class="card img-bordered ml-5 p-2">
                @if ($auth_user->image)
                    <img id="preview" src="{{ asset('/storage').'/'.$auth_user->image }}" alt="preview" style="height: 240px;"/>
                @else
                    <img id="preview" src="{{ asset('/img/no_preview.jpg') }}" alt="preview" style="height: 240px;"/>
                @endif
            </div>
            <div class=" mt-2">
                <label for="image">Pas Foto</label>
                <input type="file" name="image" id="image" class="form-control @if(session()->has('image') == true)is-invalid @endif @error('image')is-invalid @enderror">
                @if(session()->has('image') == true)
                <small class="invalid-feedback ms-2" style="color: red">
                    File {{ session()->get('image') }}
                </small>
                @endif
                @error('image')
                <small class="invalid-feedback">
                    File {{ $message }}
                </small>
                @enderror
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 mt-4">
            <div class=" mt-2 d-flex">
                <label for="nik" class="col-md-3 ms-3">NIK <i class="text-danger">*</i></label>
                <input type="text" class="form-control inline-block @error('nik')is-invalid @enderror" maxlength="16" name="nik" id="nik" value="{{ old('nik', $auth_user->nik) }}" onkeyup="onlyNumbers(this)">
                <input type="hidden" name="nik1" value="{{ old('nik', $auth_user->nik) }}">
                @error('nik')
                <small class="invalid-feedback ms-3">
                    Nik {{ $message }}
                </small>
                @enderror
            </div>
            <div class=" mt-2 d-flex">
                <label for="no_wa" class="col-md-3 ms-3">No. WA <i class="text-danger">*</i></label>
                <input type="text" class="form-control inline-block @error('no_wa')is-invalid @enderror" maxlength="15" name="no_wa" id="no_wa" value="{{ old('no_wa', $auth_user->no_wa) }}" onkeyup="onlyNumbers(this)">
                @error('no_wa')
                <small class="invalid-feedback ms-3">
                    No. WA {{ $message }}
                </small>
                @enderror
            </div>
            <div class=" mt-2 d-flex">
                <label for="place_of_birth" class="col-md-3 ms-3">Tempat Lahir <i class="text-danger">*</i></label>
                <input type="text" class="form-control inline-block @error('place_of_birth')is-invalid @enderror" name="place_of_birth" id="place_of_birth" value="{{ old('place_of_birth', $auth_user->place_of_birth) }}">
                @error('place_of_birth')
                <small class="invalid-feedback ms-3">
                    Tempat lahir {{ $message }}
                </small>
                @enderror
            </div>
            <div class=" mt-2 d-flex">
                <label for="date_of_birth" class="col-md-3 ms-3">Tanggal Lahir <i class="text-danger">*</i></label>
                <input type="date" class="form-control inline-block @error('date_of_birth')is-invalid @enderror" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $auth_user->date_of_birth) }}">
                @error('date_of_birth')
                <small class="invalid-feedback ms-3">
                    Tanggal lahir {{ $message }}
                </small>
                @enderror
            </div>
            <div class=" mt-2 d-flex">
                <label for="address" class="col-md-3 ms-3">Alamat  <i class="text-danger">*</i></label>
                <input type="text" class="form-control inline-block @error('address')is-invalid @enderror" name="address" id="address" value="{{ old('address', $auth_user->address) }}">
            </div>
            <div class=" mt-2 d-flex">
                <label for="height" class="col-md-3 ms-3">Tinggi Badan <i class="text-danger">(cm)</i> <i class="text-danger">*</i></label>
                <input type="text" class="form-control inline-block @error('height')is-invalid @enderror" name="height" id="height" value="{{ old('height', $auth_user->height) }}">
                @error('height')
                <small class="invalid-feedback ms-3">
                    Tinggi Badan {{ $message }}
                </small>
                @enderror
            </div>
            <div class=" mt-2 d-flex">
                <label for="religion" class="col-md-3 ms-3">Agama <i class="text-danger">*</i></label>
                <select name="religion" id="religion" class="form-control form-select @error('religion')is-invalid @enderror">
                    <option value="">Pilih agama</option>
                    <option value="Islam" {{ old('religion', $auth_user->religion) == 'Islam' ? 'selected' : ''}}> » &nbsp; Islam</option>
                    <option value="Kristen" {{ old('religion', $auth_user->religion) == 'Kristen' ? 'selected' : ''}}> » &nbsp; Kristen</option>
                    <option value="Hindu" {{ old('religion', $auth_user->religion) == 'Hindu' ? 'selected' : ''}}> » &nbsp; Hindu</option>
                    <option value="Budha" {{ old('religion', $auth_user->religion) == 'Budha' ? 'selected' : ''}}> » &nbsp; Budha</option>
                    <option value="Konghucu" {{ old('religion', $auth_user->religion) == 'Konghucu' ? 'selected' : ''}}> » &nbsp; Konghucu</option>
                </select>
                @error('religion')
                <small class="invalid-feedback ms-3">
                    Agama {{ $message }}
                </small>
                @enderror
            </div>
            <div class=" mt-2 d-flex">
                <label for="material_status" class="col-md-3 ms-3">Status Pernikahan <i class="text-danger">*</i></label>
                <select name="material_status" id="material_status" class="form-control form-select">
                    <option value="">Pilih status</option>
                    <option value="Kawin" {{ old('Kawin', $auth_user->material_status == 'Kawin' ? 'selected' : '' ) }}> » &nbsp; Kawin</option>
                    <option value="Belum Kawin" {{ old('Belum', $auth_user->material_status == 'Belum Kawin' ? 'selected' : '' ) }}> » &nbsp; Belum Kawin</option>
                    <option value="Janda" {{ old('Janda', $auth_user->material_status == 'Janda' ? 'selected' : '' ) }}> » &nbsp; Janda</option>
                    <option value="Duda" {{ old('Duda', $auth_user->material_status == 'Duda' ? 'selected' : '' ) }}> » &nbsp; Duda</option>
                </select>
                @error('material_status')
                <small class="invalid-feedback ms-3">
                    Status Pernikahan {{ $message }}
                </small>
                @enderror
            </div>
            
            <div class=" mt-2 d-flex">
                <label for="last_education" class="col-md-3 ms-3">Pendidikan Terakhir <i class="text-danger">*</i></label>
                <input type="text" class="form-control @error('last_education')is-invalid @enderror" name="last_education" id="last_education" value="{{ old('last_education', $auth_user->last_education) }}">
                @error('last_education')
                <small class="invalid-feedback ms-3">
                    Pendidikan Terakhir {{ $message }}
                </small>
                @enderror
            </div>
            <div class=" mt-2 d-flex">
                <label for="graduation_year" class="col-md-3 ms-3">Tahun Lulus <i class="text-danger">*</i> </label>
                <input type="text" class="form-control @error('graduation_year')is-invalid @enderror" name="graduation_year" id="graduation_year" value="{{ old('graduation_year', $auth_user->graduation_year) }}">
                @error('graduation_year')
                <small class="invalid-feedback ms-3">
                    Tahun Lulus {{ $message }}
                </small>
                @enderror
            </div>
            <div class=" mt-2 d-flex">
                <label for="sub_district" class="col-md-3 ms-3">Kecamatan <i class="text-danger">*</i> </label>
                <select name="sub_district" id="sub_district" class="form-control form-select">
                    <option value="">Pilih kecamatan</option>
                    @foreach ($subDistrict as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $auth_user->sub_district || $item->id == old('sub_district') ? 'selected' : '' }} >
                            » &nbsp; {{ $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('sub_district')
                <small class="invalid-feedback ms-3">
                    Kecamatan {{ $message }}
                </small>
                @enderror
            </div>
            <div class=" mt-2 d-flex">
                <input type="hidden" id="village_" value="{{$auth_user->village}}">
                <label for="village" class="col-md-3 ms-3">Desa / Kelurahan <i class="text-danger">*</i> </label>
                <select name="village" id="village" class="form-control form-select">
                    {{-- <option value="">Pilih kelurahan</option> --}}
                    {{-- load in script --}}
                </select>
                @error('village')
                <small class="invalid-feedback ms-3">
                    Kelurahan {{ $message }}
                </small>
                @enderror
            </div>
    
            {{-- DOKUMEN --}}
    
            <div class=" mt-2 d-flex">
                <label for="id_card" class="col-md-3 ms-3">KTP <i class="text-danger">*</i> </label>
                <input type="file" name="id_card" id="id_card" class="form-control @if(session()->has('id_card') == true)is-invalid @endif" value="{{ old('id_card', $auth_user->id_card) }}">
                @if ($auth_user->id_card)
                    <small class="w-25 pt-2 ms-2"><b> &nbsp; <a href="{{asset('/storage/'.$auth_user->id_card)}}" target="_blank">Lihat file</a> </b></small>
                @endif
                @if(session()->has('id_card') == true)
                    <small class="invalid-feedback ms-2" style="color: red">
                        File {{ session()->get('id_card') }}
                    </small>
                @endif
            </div>

            <div class=" mt-2 d-flex">
                <label for="ak1" class="col-md-3 ms-3">Ak1 / Kartu Kuning <i class="text-danger">*</i> </label>
                <input type="file" name="ak1" id="ak1" class="form-control @if(session()->has('ak1') == true)is-invalid @endif" >
                @if ($auth_user->ak1)
                    <small class="w-25 pt-2 ms-2"><b> &nbsp; <a href="{{asset('/storage/'.$auth_user->ak1)}}" target="_blank">Lihat file</a> </b></small>
                @endif
                @if(session()->has('ak1') == true)
                    <small class="invalid-feedback ms-2" style="color: red">
                        File {{ session()->get('ak1') }}
                    </small>
                @endif
            </div>
            <div class=" mt-2 d-flex">
                <label for="ijazah" class="col-md-3 ms-3">Ijazah Terakhir <i class="text-danger">*</i> </label>
                <input type="file" name="ijazah" id="ijazah" class="form-control @if(session()->has('ijazah') == true)is-invalid @endif">
                @if ($auth_user->ijazah)
                    <small class="w-25 pt-2 ms-2"><b> &nbsp; <a href="{{asset('/storage/'.$auth_user->ijazah)}}" target="_blank">Lihat file</a> </b></small>
                @endif
                @if(session()->has('ijazah') == true)
                    <small class="invalid-feedback ms-2" style="color: red">
                        File {{ session()->get('ijazah') }}
                    </small>
                @endif
            </div>
            <hr>
            <div class="ms-2 text-danger">* Form Wajib diisi *</div>
        </div>
        <button type="submit" class="btn btn-outline-success mt-3">Simpan Data</button>
    </div>
</form>

@endsection
