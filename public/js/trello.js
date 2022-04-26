$(document).ready(function(e){
    

    //showing all boards
    var boards = document.getElementsByClassName('view-board');
    Array.from(boards).forEach((element)=>{
        element.addEventListener('click',(e)=>{
            row = e.target.parentNode.parentNode.parentNode;
            boardId = row.getElementsByTagName('input')[0].value;
            console.log(boardId);
            
            window.location.replace("/lists/"+boardId);


        });
    });

    //showing all lists
    var lists = document.getElementsByClassName('view-list');
    Array.from(lists).forEach((element)=>{
        element.addEventListener('click',(e)=>{
            row = e.target.parentNode.parentNode.parentNode;
            listId = row.getElementsByTagName('input')[0].value;
            console.log(listId);
            window.location.replace("/cards/"+listId);


        });
    });

    //setting value to board_update fields
    var updates = document.getElementsByClassName('update-board');
    Array.from(updates).forEach((element)=>{
        element.addEventListener('click',(e)=>{
            row = e.target.parentNode.parentNode.parentNode;
            boardId = row.getElementsByTagName('input')[0].value;
            name = row.getElementsByTagName('td')[0].innerText;
            desc = row.getElementsByTagName('td')[1].innerText;
            console.log("boardID: "+boardId);
            console.log("name: "+name);
            console.log("desc: "+desc);
            document.getElementById('update_board_id').value = boardId;
            document.getElementById('update_board_name').value = name;
            document.getElementById('update_board_desc').value = desc;

        });
    });

    //deleting a board
    var deletes = document.getElementsByClassName('delete-board');
    Array.from(deletes).forEach((element)=>{
        element.addEventListener('click',(e)=>{
            row = e.target.parentNode.parentNode.parentNode;
            boardId = row.getElementsByTagName('input')[0].value;
            // name = row.getElementsByTagName('td')[0].innerText;
            // desc = row.getElementsByTagName('td')[1].innerText;
            // console.log("boardID: "+boardId);
            // console.log("name: "+name);
            // console.log("desc: "+desc);
            // document.getElementById('update_board_id').value = boardId;
            // document.getElementById('update_board_name').value = name;
            // document.getElementById('update_board_desc').value = desc;
            window.location.replace("/boards/delete/"+boardId);


        });
    });

    //createing new board
    // document.getElementById('create-board-button').addEventListener('click',(e)=>{
    //     name = document.getElementById('board-name').value;
    //     desc = document.getElementById('board-desc').value;
    //     //window.location.replace("/board/new/"+name+"/"+desc);

    //     console.log("creating new board ....\n"+"name: "+name+"\n"+"desc: "+desc);
    //     //route 
    // });

    // //updating a board
    // document.getElementById('update-board-button').addEventListener('click',(e)=>{
        
    // });


    // var formData = new FormData();
    // formData.append('name','khan');
    // formData.append('desc','this is a short description');
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')............
    //     }
    // });
    // //e.preventDefault();

    // $.ajax({
    //     url: "/lists",
    //     type: 'POST',
    //     data: formData,
    //     dataType: 'JSON',
    //     success: function(data) 
    //     {    
    //         if (data === true) {
    //             $('#button').text('FINISHED');
    //      }

    //         else
    //         {
    //           alert('error');
    //         }
    //     }
    //   });
});

