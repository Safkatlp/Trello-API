<!doctype html>
<html lang="en">
  <head>
    @include('header')

    <title>Card</title>
  </head>
  <body>
    @include('nav')

    <div class="container mt-3">
        <h1>Card</h1>
        <div class = "border border-2 border-dark shadow ">
            <div class="container mt-2  d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#new-card-model">Create New Card</button>
            </div>
            
            <hr>
            <div class="container">
                <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Card Name</th>
                        <th scope="col">Card Description</th>
                        <th scope="col"  class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sl =0;?>
                      @foreach ($cards as $card)
                      <tr>
                        <th scope="row">{{++$sl}}</th>
                        <td>{{$card['name']}}</td>
                        <td>{{$card['desc']}}</td>
                        <td width="100px">
                            <span class="btn-group">
                                <button type="button" class="btn btn-outline-primary " disabled>View</button> 
                                <button type="button" class="btn btn-outline-success " disabled>Update</button>
                                <button type="button" class="btn btn-outline-danger" disabled>Delete</button>
                            </span>
                        </td>
                      </tr>
                      @endforeach
                      
                      
                    </tbody>
                  </table>
            </div>

            <div>
                <!-- Modal -->
                <div class="modal fade" id="new-card-model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Create New Card</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{Route('create_card')}}">
                            @csrf
                              <input type="hidden" name="list_id" id="list_id" value="{{Session::get('lId')}}">
                                <div class="mb-3">
                                  <label for="card-name" class="form-label">Name</label>
                                  <input type="text" name="card_name" class="form-control" id="card-name" aria-describedby="card-name" placeholder="Give A Name To Card">
                                </div>
                                <div class="mb-3">
                                  <label for="card-desc" class="form-label">Description</label>
                                 <textarea name="card_desc" id="card-desc" cols="30" rows="10" class="form-control" placeholder="Enter Card Description"></textarea>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <input type="submit" class="btn btn-primary" id="create-card-button" value="Create">
                              </div>
                            </form>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
  

    @include('footer')
  </body>
</html>