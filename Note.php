<?php
include('db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIU Fydp Horizon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./Styles/note.css">
    
</head>
<body>
    
   <div>
    <?php include('navbar.php'); ?>
   </div>
    <br> <br><br>

    <div class="center_div1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1>Notes</h1>
            </div>
            <div class="col-lg-6">
                <button onclick="openDialog()" class="green-button">Add Note</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="noteList">
                    <div class="note">
                        <h4>Sample Note</h4>
                        <div class="note-buttons">
                            <button onclick="showNoteDetail('Sample Note', 'This is a sample note')" class="view-button">View</button>
                            <button onclick="deleteNote(this.parentNode.parentNode)" class="delete-button">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Note Dialog -->

<div id="addNoteDialog" class="dialog">
    <span onclick="closeDialog()" class="close">&times;</span>
    <div class="dialog-content">
        <h3>Add Note</h3>
        <label for="noteTitle">Note Title:</label>
        <input type="text" id="noteTitle" />
        <label for="noteDescription">Note Description:</label>
        <textarea id="noteDescription" rows="4"></textarea>
        <div class="center">
            <button onclick="addNote()" class="green-button">Add</button>
            <button onclick="closeDialog()" class="delete-button">Close</button>
        </div>
    </div>
</div>

<!-- Note Detail Dialog -->
<div id="noteDetailDialog" class="dialog">
    <span onclick="closeNoteDetail()" class="close">&times;</span>
    <div class="dialog-content">
        <h3>Note Detail</h3>
        <div id="noteDetail"></div>
    </div>
</div>




<script>
    // Add this to your existing JS

    function openDialog() {
        document.getElementById("addNoteDialog").style.display = "block";
    }

    function closeDialog() {
        document.getElementById("addNoteDialog").style.display = "none";
    }

    function closeNoteDetail() {
        document.getElementById("noteDetailDialog").style.display = "none";
    }

    function addNote() {
        var noteTitle = document.getElementById("noteTitle").value;
        var noteDescription = document.getElementById("noteDescription").value;

        if (noteTitle.trim() !== "" && noteDescription.trim() !== "") {
            var noteList = document.getElementById("noteList");

            var noteDiv = document.createElement("div");
            noteDiv.classList.add("note");
            noteDiv.innerHTML = `<h4>${noteTitle}</h4><p>${noteDescription}</p>
                <div class="note-buttons">
                    <button onclick="showNoteDetail('${noteTitle}', '${noteDescription}')" class="view-button">View</button>
                    <button onclick="deleteNote(this.parentNode.parentNode)" class="delete-button">Delete</button>
                </div>`;

            noteList.appendChild(noteDiv);

            // Clear the input fields
            document.getElementById("noteTitle").value = "";
            document.getElementById("noteDescription").value = "";

            // Close the add note dialog
            closeDialog();
        }
    }

    function showNoteDetail(title, description) {
        document.getElementById("noteDetail").innerHTML = `<h4>${title}</h4><p>${description}</p>
            <div class="note-buttons">
                <button onclick="closeNoteDetail()" class="delete-button">Close</button>
            </div>`;
        document.getElementById("noteDetailDialog").style.display = "block";
    }

    function deleteNote(noteDiv) {
        var noteList = document.getElementById("noteList");
        noteList.removeChild(noteDiv);
    }
</script>
</body>

</html>
