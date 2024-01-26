<?php 
include "controller/controller.auth.php";
$auth = new Auth();
$useraccount = $auth->getSession("name");
$isLoggedIn = $auth->getSession("auth");
$auth->redirect($isLoggedIn, true, "login.php");
$pageTitle = "PMC Dashboard - Pages";
include "components/header.php";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<body>
    <?php include "components/sidenav.php"; ?>

    <main>
        <div class="breadcrumbs">
            <div class="d-flex px-3">
                <div class="me-auto"><h3>Pages</h3></div>

                <div class="align-self-center">
                    <a href="#" class=""> <i class="bi bi-person-circle"></i> Profile</a>
                </div>
            </div>
        </div>

        <table class="table table-sm table-striped" id="table"></table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        initiateTable();
    });

    async function initiateTable() {
        const jsonFileData = await fetch("https://jsonplaceholder.typicode.com/posts");
        const jsonBody = await jsonFileData.json();

        const convertedObject = convertObject(jsonBody);

        const dataTable = new simpleDatatables.DataTable("#table", {
            data: convertedObject,
            searchable: true,
            fixedHeight: true,
        });
        
        // dataTable.columns().remove([0, 2, 3, 6]);
    }

    function convertObject(dataObject) {
        if (dataObject.length === 0) return {
            headings: [],
            data: []
        };

        let obj = {
            // Quickly get the headings
            headings: Object.keys(dataObject[0]),

            // data array
            data: []
        };

        const len = dataObject.length;
        // Loop over the objects to get the values
        for (let i = 0; i < len; i++) {
            obj.data[i] = [];

            for (let p in dataObject[i]) {
                if (dataObject[i].hasOwnProperty(p)) {
                    obj.data[i].push(dataObject[i][p]);
                }
            }
        }

        return obj
    };
</script>
</body>