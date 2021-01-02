<div class="form-group">
    <label for="name" class="m-0">Name</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text bg-primary text-light">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
        </span>
      </div>
      <input id="name" type="text" class="form-control" name="name" value="{{ $candidate->name ??  old('name') }}"
        placeholder="Candidate name" autofocus>
    </div>
    @error('name')
    <span class="text-danger">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="details" class="m-0">Candidate Details</label>
    <textarea name="details" id="details" class="form-control" cols="30"
  rows="3">{{ $candidate->details ?? old('details') }}</textarea>
    @error('details')
    <span class="text-danger">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  
  <div class="form-group">
    <label for="image">Upload Candidate image</label>
    <input type="file" name="image" id="image" class="form-control-file border p-1" value="{{ $candidate->image ??  old('image') }}">
    @error('image')
    <span class="text-danger">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>