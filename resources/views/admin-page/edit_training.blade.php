@extends('admin-page.layouts.main_layout')

@section('content-pages')

<div class="content-header">
    <div class="container-fluid">
      <div class="row my-2">
        <div class="col-sm-6">
          <h3 class="m-0 ml-2">{{ $title}}</h3>
        </div><!-- /.col --> 
      </div><!-- /.row -->
      <hr style="margin-bottom: 0">
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card mx-3 elevation-1 p-3 w-75">
            <form action="/service/{{$dataTraining->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row mx-2">
                    {{-- <input type="hidden" name="id" value="{{$dataTraining->id}}"> --}}
                    <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                        <label for="category_id">Kategori</label>
                        <select class="form-control @error('category_id')is-invalid @enderror" name="category_id" id="category_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($dataCategory as $item)
                                <option value="{{ $item->id }}" {{ $dataTraining->category_id == $item->id ? 'selected' : ''}}>
                                     »  {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="invalid-feedback">
                            Kategori {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 mt-2">
                        <div class="form-check mt-1">
                            <label for="is_active">Aktif ?</label>
                            <input class="form-check-input mt-5" type="checkbox" {{ $dataTraining->is_active == 'Y' ? 'checked' : '' }} value="Y" name="is_active" id="is_active" style="width: 1.3rem; height: 1.3rem; top:-1rem; left: 2.5rem;">
                            <div class="form-check-label" style="margin-left: 30px">Ya</div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                        <label for="title">Judul Pelatihan</label>
                        <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title" value="{{ old('title', $dataTraining->title) }}">
                        @error('title')
                        <small class="invalid-feedback">
                            Judul {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ $dataTraining->description }}</textarea>
                    </div>
                    
                    {{-- <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control @error('date')is-invalid @enderror" name="date" id="date" value="{{ old('date') }}">
                        @error('date')
                        <small class="invalid-feedback">
                            Tanggal {{ $message }}
                        </small>
                        @enderror
                    </div> --}}

                </div>

                <hr style="margin: 0 22px 20px;">
                <div class="row justify-content-end mx-3">
                    <section class="col-lg-4">
                        <section style="float: right;">
                            <a href="/data-admin" class="btn btn-outline-secondary mr-2"><i class="fas fa-backspace"></i> Batal</a>
                            <button class="btn my-button-save"><i class="far fa-save"></i> Simpan</button>
                        </section>
                    </section>
                </div>
                
            </form>
        </div>
    </div>
</section> 
    
@endsection