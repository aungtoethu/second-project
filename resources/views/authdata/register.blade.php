<x-layout>
    <div class="flex-box">
    <div class="d-flex justify-content-center">
    <form action="" method="POST">
        @csrf
    <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input require name="name" type="text" class="form-control" id="name">
            <x-error name="name" />
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
            <x-error name="email"></x-error>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" require>
            <x-error name="password"></x-error>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
</x-layout>