<!doctype html>
<html lang="en">
  <head>
    @include('header')

    <title>Board</title>
  </head>
  <body>
    @include('nav')

    <div class="container mt-3">
        <h1>Board</h1>
        <div class = "border border-2 border-dark shadow">
            <div class="container mt-2  d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-secondary" id="create-board-modal"  data-bs-toggle="modal" data-bs-target="#new-board-model">Create New Board</button>
            </div>
            
            <hr>
            <div class="container">
                <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Board Name</th>
                        <th scope="col">Board Description</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sl =0;?>
                      @foreach ($boards as $board)
                     
                      <tr>
                        <th scope="row"> {{++$sl;}}</th>
                        <input type="hidden" name="board-id" id="{{'board-id'.$sl}}" value="{{$board['id']}}">
                        <td>{{$board['name']}}</td>
                        <td>{{$board['desc']}}</td>
                        <td width="100px">
                            <span class="btn-group">
                                <button type="button" class="btn btn-outline-primary view-board"   id="{{'view-board'.$sl}}">View</button>
                                <button type="button" class="btn btn-outline-success update-board" id="{{'update-board'.$sl}}" data-bs-toggle="modal" data-bs-target="#update-board-model">Update</button>
                                <button type="button" class="btn btn-outline-danger delete-board"  id="{{'delete-board'.$sl}}">Delete</button>
                            </span>
                        </td>
                      </tr>
                      {{--<script>console.log(document.getElementById('<?php echo "board-id".$sl?>').value);</script>--}}
                      @endforeach
                      
                      
                    </tbody>
                  </table>
            </div>

            <div>
                <!-- create Modal -->
                <div class="modal fade" id="new-board-model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Create New Board</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{Route('create_board')}}"> 
                            @csrf
                                <div class="mb-3">
                                  <label for="board-name" class="form-label">Name</label>
                                  <input type="text" class="form-control" id="board-name" name="board_name" aria-describedby="board-name" placeholder="Give A Name To Board">
                                </div>
                                <div class="mb-3">
                                  <label for="board-desc" class="form-label">Description</label>
                                 <textarea name="board_desc" id="board-desc" cols="30" rows="10" class="form-control" placeholder="Enter Board Description"></textarea>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <input type="submit" class="btn btn-primary"  id="create-board-button" value="Create">
                                  
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>


            <div>
                <!--update Modal -->
                <div class="modal fade" id="update-board-model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Update Board</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{Route('update_board')}}"> 
                              {{method_field('PUT')}}
                            @csrf
                                <input type="hidden" name="update_board_id" id="update_board_id" value="">
                                <div class="mb-3">
                                  <label for="update-board-name" class="form-label">Name</label>
                                  <input type="text" name="update_board_name" class="form-control" id="update_board_name" aria-describedby="update-board-name">
                                </div>
                                <div class="mb-3">
                                  <label for="update-board-desc" class="form-label">Description</label>
                                 <textarea name="update_board_desc" id="update_board_desc" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <input type="submit" class="btn btn-primary" id="update_board_button" value="Update">
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