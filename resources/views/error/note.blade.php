<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          {{-- Hiển thị lỗi nếu có --}}
          @if (count($errors) > 0)
            @foreach ($errors->all() as $e)
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Lỗi!</strong> {{ $e }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endforeach
          @endif

          {{-- Hiển thị thông báo --}}
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          @if (session('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('danger') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
        </div>
      </div>
    </div>