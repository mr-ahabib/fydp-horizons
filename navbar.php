
<nav class="navbar navbar-dark navbar-custom fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><h3>UIU Fydp Horizon</h3></a>

        <!-- Updated search form -->
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
        </form>

        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 ps-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
                        <a class="nav-link active" aria-current="page" href="#">Publish Paper</a>
                        <a class="nav-link active" aria-current="page" href="Facultylist.php">Mentors</a>
                        <a class="nav-link active" aria-current="page" href="Notes.php">Note</a>
                        <a class="nav-link active" aria-current="page" href="#">Notifications</a>
                        <a class="nav-link active" aria-current="page" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<style>
    input#searchInput {
  height: 40px;
  margin-top: -48px;
  margin-left: 250px;
}


.table th, .table td {
            text-align: center;
        }
        .navbar-custom {
            background-color: #42b1fa;
        }
        .navbar-brand {
            text-align: center;
            width: 100%;
            color: #ffffff; 
        }
        body {
            background-color: #f8f9fa; 
        }
        .container {
            background-color: #ffffff; 
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .d-flex{
            margin-left: 850px;
        }
</style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the table and search input element
            const facultyTable = document.getElementById('facultyTable');
            const searchInput = document.getElementById('searchInput');

            // Add event listener for the search input
            searchInput.addEventListener('input', function () {
                const searchText = searchInput.value.toLowerCase();

                // Loop through each row in the table body
                const rows = facultyTable.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
                for (let i = 0; i < rows.length; i++) {
                    const row = rows[i];
                    const facultyName = row.getElementsByTagName('td')[0].innerText.toLowerCase();
                    const facultyField = row.getElementsByTagName('td')[1].innerText.toLowerCase();

                    // Show or hide the row based on the search text in name or field
                    if (facultyName.includes(searchText) || facultyField.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>
