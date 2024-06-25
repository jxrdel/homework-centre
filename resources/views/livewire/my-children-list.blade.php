
<div class="row">

    @foreach ($children as $child)
        <div class="card" style="max-width: 540px;margin-top:30px; padding-left:30px">
            <div class="row g-0">
            <div class="col-md-4">
                <img src="https://thumbs.dreamstime.com/b/small-baby-cartoon-minimalism-character-illustration-isolated-image-small-baby-cartoon-minimalism-character-123813461.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">{{$child->FirstName}} {{$child->LastName}}</h5>
                <p class="card-text">DOB: {{$child->DOB}}</p>
                <p class="card-text"><a class="btn btn-primary" href="#">Edit</a></p>
                </div>
            </div>
            </div>
        </div>
    @endforeach
</div>
