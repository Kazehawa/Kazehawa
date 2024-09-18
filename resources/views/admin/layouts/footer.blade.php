
</div>


                <script>
                        // Confirmation before deleting a live
                        var deleteForms = document.getElementsByClassName('delete-form');
                        Array.prototype.forEach.call(deleteForms, function(form) {
                        form.addEventListener('submit', function(event) {
                            event.preventDefault();
                            var confirmed = confirm('Are you sure you want to delete this live?');
                            if (confirmed) {
                            this.submit();
                            }
                        });
                        });
                  </script>

  </body>
</html>