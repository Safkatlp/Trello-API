

<!doctype html>
<html lang="en">
  <head>
    @include('header')

    <title>auth</title>
  </head>
  <body>
   

    <div class="container mt-3 p-4">
        <form method="" action="{{route('trello')}}"> 
            
              <div class="mb-3">
                <label for="api_key" class="form-label">Api Key</label>
                <input type="text" name="api_key_input" class="form-control" id="api_key_input" aria-describedby="api_key_input">
              </div>
              <div class="mb-3">
                <label for="api_secret_input" class="form-label">Api Secret</label>
                <input type="text" name="api_secret_input" class="form-control" id="api_secret_input" aria-describedby="api_secret_input">
              </div>
              <div class="modal-footer">
                
                <input type="submit" class="btn btn-primary" id="auth_button" value="Authorize">
                </div>
          </form>
    </div>
  

    @include('footer')
  </body>
</html>