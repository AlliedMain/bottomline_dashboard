<?php 
   $pageName = 'Add Books';
   $breadCrumbs = 'Add Books';
   include('inc/css_body_side_bar.php');
   include('inc/top_nav_bar.php');
   ?>   
         
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
           
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 col-lg-12">
                     
                     
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Book Details</h4>

                               <div><?php echo $message;?></div>
                           
                           </div>

                        </div>

                        <div class="iq-card-body">
                          
                           <!-- <form action="book_submit.php" method="POST"> -->
                              <form>
                               
                               
                           
                              <div class="form-group">
                                 <label for="book_title">Title of the Book</label>
                                 <input type="text" class="form-control" name="book_title" id="book_title" placeholder="Enter Title of the Book">
                              </div>
                              <div class="form-group">
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
                              <div class="form-group">
                                 <label for="about_book">Description of the Book</label>
                                 <textarea class="form-control" name="about_book" id="about_book" rows="5"></textarea>
                              </div>
                              
                              <button type="button" name='submitData' id='submitData' class="btn btn-primary">Submit</button>
                              <button type="reset" class="btn iq-bg-danger">Cancel</button>
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
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js";   
   

  import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-firestore.js";
  import { getStorage, ref, uploadBytes, getDownloadURL } from "https://www.gstatic.com/firebasejs/10.14.1/firebase-storage.js";

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
  const storage = getStorage(app);

  // Reference the "epubs" collection
  const epubsCollectionRef = collection(db, "epubs");

  //const loadingImage = document.getElementById('loading-image'); // Assuming you have an element with this ID

  submitData.addEventListener('click', async (e) => {
    e.preventDefault(); // Prevent default form submission

    // Show loading image
    //loadingImage.style.display = 'block';

    // Get form data
    var bookName = document.getElementById('book_title').value;
    var authorName = document.getElementById('author_name').value;
    var description = document.getElementById('about_book').value;
    const bookFile = document.getElementById('bookFile').files[0]; // Get the epub file
    const imageFile = document.getElementById('bookImage').files[0]; // Get the image file

    // Check for file selection (optional)
    /*if (!bookFile) {
      alert("Please select an epub file to upload.");
      return;
    }

    if (!imageFile) {
      alert("Please select an image file to upload.");
      return;
    }*/

    // Create storage references for files
    const bookStorageRef = ref(storage, `epubs/${bookFile.name}`); // Customize path as needed
    const imageStorageRef = ref(storage, `epubs_images/${imageFile.name}`); // Customize path as needed

    try {
      // Upload epub and get download URL
      const epubSnapshot = await uploadBytes(bookStorageRef, bookFile);
      const epubDownloadURL = await getDownloadURL(epubSnapshot.ref);

      // Upload image and get download URL
      const imageSnapshot = await uploadBytes(imageStorageRef, imageFile);
      const imageDownloadURL = await getDownloadURL(imageSnapshot.ref);

      // Get comma-separated genre values from input field
      const genreInput = document.getElementById('genre');
      const genres = genreInput.value.split(','); // Split the string by commas

      // Clean and trim genre values (optional)
      const cleanGenres = genres.map(genre => genre.trim()); // Remove leading/trailing whitespaces

      // Data to be added
      const newEpub = {
        title: bookName,
        author: authorName,
        about: description,
        epubUrl: epubDownloadURL,
        imageUrl: imageDownloadURL,
        genres: cleanGenres // Array of genre strings
      };

      // Add the new epub to the collection
      await addDoc(epubsCollectionRef, newEpub);
      alert('Book Details added successfully!');
      //loadingImage.style.display = 'none';

    } catch (error) {
      console.error('Error adding document:', error);
      alert("Error uploading files or adding document:", error);
      //loadingImage.style.display = 'none';
    }
  });
</script>
       
      <?php include('inc/load_javascript.php');?>
