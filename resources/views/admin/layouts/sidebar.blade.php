<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="/admin">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/job/new') ? 'active' : '' }}" href="#" data-toggle="modal" data-target="#trackjob">
                  <span data-feather="credit-card"></span>
                  Send a bill
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Client Jobs</span>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
            </ul>
          </div>
        </nav>

<!-- Modal -->
<div class="modal fade" id="trackjob" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bill a client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">
              The user was billed!
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
              The user was not billed! An error occured!
            </div>
        @endif

        <form action="/admin/job/new" method="post">

          @csrf

          <div class="form-group">
            <label>Client</label>
            <select class="form-control" name="client">
              <option selected></option>
              @foreach(\App\User::all() as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->domain }})</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Bill amount</label>
            <input class="form-control" name="charge" type="text">
            <small class="form-text text-muted">Please specify the amount in <b>pennies</b>, as this makes it easier for Stripe to process the payment.</small>
          </div>

          <div class="form-group">
            <label>Description of the work</label>
            <textarea name="description" class="form-control" rows="10"></textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-block btn-outline-primary btn-lg">Send bill</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="viewclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View a client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="/admin/view/client/" method="post">

          @csrf

          <div class="form-group">
            <label>Client</label>
            <select class="form-control" name="client">
              <option selected></option>
              @foreach(\App\User::all() as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->domain }})</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-block btn-outline-primary btn-lg">View Client</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
