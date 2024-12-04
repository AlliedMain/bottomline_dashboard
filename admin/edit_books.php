<?php 

   $pageName = 'Update Books';
   $breadCrumbs = 'Update Books';
   include('inc/css_body_side_bar.php');
   include('inc/top_nav_bar.php');
   ?>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js";
import { getFirestore, doc, getDoc, updateDoc } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-firestore.js";

// Your web app's Firebase configuration
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

const urlParams = new URLSearchParams(window.location.search);
const docId = urlParams.get('id');

// Replace "yourCollectionName" and "yourDocumentId" with your actual values
const docRef = doc(db, "epubs", docId);

// Get the document
getDoc(docRef)
  .then((doc) => {
    if (doc.exists()) {
      const documentData = doc.data();

      // Check if "genres" field exists and is an array
      if (documentData.genres && Array.isArray(documentData.genres)) {
        const genres = documentData.genres.join(', '); // Join array elements with commas
        document.getElementById("genre").value = genres;
      } else {
        console.warn("genres field is missing or not an array");
      }

      document.getElementById("book_title").value = documentData.title;
      document.getElementById("author_name").value = documentData.author;
      document.getElementById("about_book").value = documentData.about;

    } else {
      alert("No such document!");
    }
  })
  .catch((error) => {
    console.error("Error getting document:", error);
  });
</script>
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 col-lg-12">
                     
                     
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Book Details</h4>

                               <div><?php //echo $message;?></div>
                           
                           </div>

                        </div>

                        <div class="iq-card-body">
                          
                           <!-- <form action="book_submit.php" method="POST"> -->
                           <form>
                              <div class="form-group" id='bookTitle'>
                                 <label for="book_title">Title of the Book</label>
                                 <input type="text" class="form-control" name="book_title" id="book_title" placeholder="Enter Title of the Book" required>
                              </div>
                              <div class="form-group" id='authorName'>
                                 <label for="author_name">Author Name</label>
                                 <input type="text" class="form-control" name="author_name" id="author_name" placeholder="Enter Author Name">
                              </div>
                              <div class="form-group">
                                 <label for="author_name">Genre</label>
                                 <input type="text" class="form-control" name="genre" id="genre" placeholder="Enter Genre name">
                                 <small>For multiple genres, enter them separated by commas.</small>
                              </div>
                              <div class="form-group">
                                 <label for="bookFile">Book Epub File</label>
                                 <input type="file" class="form-control-file" id="bookFile" name="bookFile">
                              </div>

                              <div class="form-group">
                                 <label for="bookImage">Book Image</label>
                                 <input type="file" class="form-control-file" id="bookImage" name="bookImage">
                              </div>
                              <div class="form-group" id='aboutBook'>
                                 <label for="about_book">Description of the Book</label>
                                 <textarea class="form-control" name="about_book" id="about_book" rows="5"></textarea>
                              </div>
                             
                              <button type="button" name='updateBtn' id='updateBtn' class="btn btn-primary">Submit</button>
                              <button type="reset" class="btn iq-bg-danger">Reset</button>
                           </form>
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
      <!-- Footer END -->
      
<script type="module">

  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js";
  import { getFirestore, doc, updateDoc, getDoc } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-firestore.js";
  import { getStorage, ref, uploadBytes, getDownloadURL } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-storage.js";

  updateBtn.addEventListener('click', async (e) => {
    e.preventDefault(); // Prevent default form submission

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
    const storage = getStorage(app);   


    const urlParam = new URLSearchParams(window.location.search);
    const docId = urlParam.get('id');
    const docRef = doc(db, "epubs", docId);

    // Get form data
    var bookName = document.getElementById('book_title').value;
    var authorName = document.getElementById('author_name').value;
    var description = document.getElementById('about_book').value;
    const bookFile = document.getElementById('bookFile').files[0];
    const imageFile = document.getElementById('bookImage').files[0];

    // Check for required fields (including genre)
    if (!bookName || !authorName || !description || !document.getElementById('genre').value) {
      alert("Please fill in all required fields, including genre.");
      return;
    }

    // Get comma-separated genre values from input field
    const genreInput = document.getElementById('genre');
    const genres = genreInput.value.split(','); // Split the string by commas

    // Clean and trim genre values (optional)
    const cleanGenres = genres.map(genre => genre.trim()); // Remove leading/trailing whitespaces

    // Update data object
    let newData = {
      title: bookName,
      author: authorName,
      about: description,
      genres: cleanGenres // Array of genre strings
    };

    try {
      // Upload new book file (if selected)
      // ... (same logic as before)

      // Upload new image file (if selected)
      // ... (same logic as before)

      // Update the document
      await updateDoc(docRef, newData);
      alert("Document updated successfully!");

    } catch (error) {
      console.error('Error updating document:', error);
      alert("Error uploading files or updating document:", error);
    }
  });
</script>

       
      <?php include('inc/load_javascript.php');?>
