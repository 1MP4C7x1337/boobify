<form method='post' action="uploadFile" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image[]" multiple>
    <button type="submit">submit</button>
</form>