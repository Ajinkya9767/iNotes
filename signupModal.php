
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">
    Launch demo modal
</button> -->
        
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">SignUp to iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/php_tutorial/Forum/partial/_handleSignupModal.php" method="POST">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="signupFirstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" name="signupFirstname" id="signupFirstname" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="signupLastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" name="signupLastname" id="signupLastname" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="signupEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="signupEmail" id="signupEmail" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="signupPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
                </div>
                <div class="mb-3">
                    <label for="signupCPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="signupCPassword" name="signupCPassword" required>
                </div>
                <!-- <div class="g-recaptcha brochure__form__captcha" data-sitekey="YOUR SITE KEY"></div> -->
                <button type="submit" class="btn btn-primary">SignUp</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
