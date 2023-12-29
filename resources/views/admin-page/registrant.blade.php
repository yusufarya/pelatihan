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
        <div class="row mx-2">
          <div class="row justify-content-end mb-2 w-100">
            
            <form id="submitForm" action="registrant" method="GET" >
              @csrf
              <div class="row">
                <div class="col d-flex">
                  <span class="pr-3 pt-2">Status </span>
                  <select name="status" id="status" class="form-select form-control" style="display: inline">
                    <option value=""> Menunggu</option>
                    <option value="Y" {{ $status == 'Y' ? 'selected' : '' }}> Diterima</option>
                    <option value="N" {{ $status == 'N' ? 'selected' : '' }}> Ditolak</option>
                  </select>
                </div>
              </div>

            </form>
          </div>
          <table class="table table-bordered table-sm">
              <thead>
                  <tr class="my-bg-primary text-white">
                      <th style="width: 11%">Nomor</th>
                      <th>Nama</th>
                      <th style="width: 11%">Jenis Kelamin</th>
                      <th>Pelatihan</th>
                      <th style="width: 15%;">Tanggal Dftr Pelatihan</th>
                      <th>Periode </th>
                      <th style="text-align: center; width: 9%;">Status </th>
                      <th style="width: 8%; text-align: center;">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($participant as $row)
                  <tr>
                      <td>{{ $row->participant_number }}</td>
                      <td>{{ $row->fullname }}</td>
                      <td>{{ $row->gender == 'M' ? 'Laki-laki' : 'Perempuan' }}</td>
                      <td>{{ $row->trainingsTitle }}</td>
                      <td>{{ date('d M Y', strtotime($row->date)) }}</td>
                      <td>{{ $row->gelombang }}</td>
                      <td style=" text-align: center;">
                        @if ($row->is_active == "Y")
                          @if ($row->approve == 'Y')
                            <span class="text-success"><i class="fas fa-check-square text-success"> </i> Approved</span>
                          @elseif($row->approve == "N")
                            <span class="text-red"><i class="fas fa-window-close text-danger"> </i> Rejected</span>
                            @else
                            <span class="text-secondary"><i class="far fa-question-circle text-secondary"> </i> Waiting</span>
                          @endif
                        @else
                          TELAH SELESAI
                        @endif
                      </td>
                      <td style=" text-align: center;">
                        @if ($row->is_active == "Y")
                          @if ($row->approve == "Y")
                            <a href="#" class="text-success"> <i class="fas fa-user-check"></i> </a>
                          @else
                            <a href="#" onclick="approve(`{{$row->participant_number}}`, `{{$row->fullname}}`, `{{$row->training_id}}`, `{{$row->trainingsTitle}}`)" class="text-warning">
                              <i class="fas fa-user-edit"></i>
                            </a>
                          @endif
                          &nbsp;
                          <a href="#" onclick="decline(`{{$row->participant_number}}`, `{{$row->fullname}}`, `{{$row->training_id}}`, `{{$row->trainingsTitle}}`)" class="text-danger">
                            <i class="fas fa-times-circle"></i>
                          </a>
                        @else
                          <i class="fas fa-minus-circle text-danger"></i>
                        @endif
                        
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
    </div>
</section> 

<div class="modal fade" id="modal-edit" tabindex="-1">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-2 font-weight-bold">Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
        @csrf
        <div class="modal-body p-3">
          <div class="row" id="content-edit">
            
          </div>
        </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-success">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-delete" tabindex="-1">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-2 font-weight-bold">Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-body p-3">
          <div class="row" id="content-delete">
            
          </div>
        </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection