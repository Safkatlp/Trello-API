<!doctype html>
<html lang="en">
  <head>
    @include('header')

    <title>List</title>
  </head>
  <body>
    @include('nav')

    <div class="container mt-3 ">
        <h1>List</h1>
        <div class = "border border-2 border-dark shadow ">
            <div class="container mt-2  d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#new-list-model">Create New List</button>
            </div>
            
            <hr>
            <div class="container">
                <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">List Name</th>
                        <th scope="col"  class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sl =0;?>
                      @foreach ($lists as $list)
                      <tr>
                        <th scope="row">{{++$sl;}}</th>
                        <input type="hidden" name="list-id" id="{{'list-id'.$sl}}" value="{{$list['id']}}">
                        <td>{{$list['name']}}</td>
                        <td width="100px">
                            <span class="btn-group">
                                <button type="button" class="btn btn-outline-primary view-list"   id="{{'view-list'.$sl}}">View</button> 
                                <button type="button" class="btn btn-outline-success update-list" id="{{'update-list'.$sl}}" disabled>Update</button>
                                <button type="button" class="btn btn-outline-danger delete-list"  id="{{'delete-list'.$sl}}" disabled>Delete</button>
                            </span>
                        </td>
                      </tr>
                      @endforeach
                      
                      
                    </tbody>
                  </table>
            </div>

            <div>
                <!-- Modal -->
                <div class="modal fade" id="new-list-model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Create New List</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{Route('create_list')}}">
                            @csrf
                                <input type="hidden" name="board_id" id="board_id" value="{{Session::get('bId')}}">
                                <div class="mb-3">
                                  <label for="list-name" class="form-label">Name</label>
                                  <input type="text" class="form-control" name="list_name" id="list_name" aria-describedby="list-name" placeholder="Give A Name To List">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <input type="submit" class="btn btn-primary"  id="create-list-button" value="Create">
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