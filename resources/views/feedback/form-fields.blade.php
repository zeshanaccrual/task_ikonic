<div class="row mb-1">
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="title">Title</label>
        <input type="text" class="form-control form-control-lg @error('pa_number') is-invalid @enderror" id="title"
            name="title" placeholder="Feedback Title" value="" />
        {{-- <small class="text-muted">Enter Consumer PA Number</small> --}}
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="feedback_type">Category</label><span class="text-danger">*</span>
        <select class="form-control form-control-lg select2" name="feedback_type" id="feedback_type">

            @foreach ($feedback_categroy as $category)
                <option value="{{ $category->id }}">{{ $category->feedback_type }}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="mb-1 col-lg-12 col-md-12 col-sm-12">
    <label class="form-label" for="exampleFormControlTextarea1">Desciption</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="Desciption"></textarea>
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>

 <!-- Add the Submit Button -->
 <div class="mb-1 col-lg-12 col-md-12 col-sm-12">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
