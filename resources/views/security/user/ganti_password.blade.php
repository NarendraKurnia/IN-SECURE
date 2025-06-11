<style>
    .input-group {
        position: relative;
        display: flex;
        align-items: center;
    }
    .input-group input {
        flex: 1;
    }
    .toggle-password {
        position: absolute;
        right: 10px;
        cursor: pointer;
        user-select: none;
        font-size: 1.2rem;
        color: #555;
    }
</style>
<div class="container mt-4">
    <h4>Ganti Password</h4>

    @if(session('sukses'))
        <div class="alert alert-success">{{ session('sukses') }}</div>
    @endif

    @if(session('warning'))
        <div class="alert alert-danger">{{ session('warning') }}</div>
    @endif

    <form action="{{ route('user.proses_ganti_password') }}" method="POST">
        @csrf

        <div class="form-group">
    <label>Password Lama</label>
    <div class="input-group">
        <input type="password" name="old_password" class="form-control" required id="old_password">
        <span class="toggle-password" onclick="togglePassword('old_password')"><i class="fa fa-eye" aria-hidden="true"></i></span>
    </div>
</div>

<div class="form-group mt-2">
    <label>Password Baru</label>
    <div class="input-group">
        <input type="password" name="new_password" class="form-control" required id="new_password">
        <span class="toggle-password" onclick="togglePassword('new_password')"><i class="fa fa-eye" aria-hidden="true"></i></span>
    </div>
</div>

<div class="form-group mt-2">
    <label>Konfirmasi Password Baru</label>
    <div class="input-group">
        <input type="password" name="new_password_confirmation" class="form-control" required id="new_password_confirmation">
        <span class="toggle-password" onclick="togglePassword('new_password_confirmation')"><i class="fa fa-eye" aria-hidden="true"></i></span>
    </div>
</div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>

