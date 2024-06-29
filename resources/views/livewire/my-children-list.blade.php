
<div class="row row row-cols-1 row-cols-md-3 g-3 justify-content-center">

    @forelse ($children as $child)
    <div class="col">
        <div class="card" style="max-width: 540px;margin-top:30px; padding-left:20px;min-height:180px">
            <div class="row g-0">
            <div class="col-md-4">
                <div class="" style="display: flex; justify-content: center; align-items: center;height: 180px;">
                    <img src="{{ Storage::url($child->picturepath) }}" width="150" height="150" class="img-fluid rounded-start" alt="...">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">{{$child->FirstName}} {{$child->LastName}}</h5>
                <p class="card-text">DOB: {{ \Illuminate\Support\Carbon::parse($child->DOB)->format('F jS, Y') }}</p>
                <p class="card-text"><a class="btn btn-primary" href="#">Edit</a></p>
                </div>
            </div>
            </div>
        </div>
    </div>
    @empty
    <p style="text-align: center">No children registered</p>
    @endforelse
</div>
