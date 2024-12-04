
<?php 

   $pageName = 'List of Books';
   $breadCrumbs = 'List of Books';
   include('inc/css_body_side_bar.php');
   include('inc/top_nav_bar.php');
   //require('book_list_data.php');
   ?>
         
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title"><?php echo $pageName;?></h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="add_books.php" class="btn btn-primary">Add New Book</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           
                           <div class="table-responsive">
                              <table id="datatable" class="data-tables table table-striped table-bordered"  style="width:100%">
                                 <thead>
                                    <tr>
                                       <th style="width: 10%;">Sl No</th>
                                       <th style="width: 40%;">Title</th>
                                       <th style="width: 35%;">Author</th>
                                       <th style="width: 15%;">Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   
                                    
                                 </tbody>
                                 <!-- <tfoot>
                                    <tr>
                                       <th>Name</th>
                                       <th>Position</th>
                                       <th>Office</th>
                                       <th>Age</th>
                                       <th>Start date</th>
                                       <th>Salary</th>
                                    </tr>
                                 </tfoot> -->
                              </table>


<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js";
import { getFirestore, collection, getDocs, deleteDoc } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-firestore.js";

// Replace with your Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyAGZ_XQySQSvieXp3OnX0WNLJTqRpyhIcE",
    authDomain: "epub-88cb9.firebaseapp.com",
    projectId: "epub-88cb9",
    storageBucket: "epub-88cb9.appspot.com",
    messagingSenderId: "864025277482",
    appId: "1:864025277482:web:99e99045dd5e01a8d7ff53"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

// Reference the "epubs" collection
const epubsCollectionRef = collection(db, "epubs");

// Delete confirmation function
function confirmDelete(documentId) {
  if (confirm("Are you sure you want to delete this record?")) {
    deleteDocument(documentId);
  } else {
    // User canceled deletion
  }
}

// Delete document function (unchanged)
async function deleteDocument(documentId) {
  const docRef = doc(db, "epubs", documentId);
  try {
    await deleteDoc(docRef);
    alert("Document deleted successfully!");
    // Re-fetch data to update table (optional)
  } catch (error) {
    console.error("Error deleting document:", error);
    alert("Error deleting document:", error);
  }
}

// Get all documents from the collection and populate the table
getDocs(epubsCollectionRef)
  .then((snapshot) => {
    const tableBody = document.getElementById("datatable").querySelector("tbody");
    let serialNumber = 1;

    snapshot.forEach((doc) => {
      const epub = doc.data();
      const row = document.createElement("tr");
      row.innerHTML = `
        <td><span class="math-inline">${serialNumber}</td>
<td></span>${epub.title}</td>
        <td><span class="math-inline">${epub.author}</td>
<td>
<a href="view_book.php?id=${doc.id}"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>&nbsp;&nbsp;&nbsp;
          <a href="edit_books.php?id=${doc.id}"><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>&nbsp;&nbsp;&nbsp;
<i class="fa fa-trash" aria-hidden="true" title="Delete" onclick="confirmDelete('${doc.id}')"></i>
        </td>`;
      tableBody.appendChild(row);
      serialNumber++;
    });
  })
  .catch((error) => {
    alert("Error getting documents: ", error);
  });

  const table = $('#datatable').DataTable({
          data: tableData,
          columns: [
            { title: "S.No" },
            { title: "Title" },
            { title: "Author" },
            { title: "Actions" }
          ],
          pageLength: 10, // Number of rows per page
          searching: true, // Enable search functionality
          initComplete: function () {
            var api = this.api();
            $('#searchInput').on('keyup', function () {
              api.search($(this.val()).trim()).draw();
            });
          }
        });
</script>


                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
       <!-- Footer -->
      <?php include('inc/footer.php');?>
      <?php include('inc/load_javascript.php');?>