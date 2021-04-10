export default (editor, config) => {
    return {
      run(editor) {

        Swal.fire({
            title             : 'Are you sure?',
            text              : "Sure you want to save your data!",
            icon              : 'warning',
            showCancelButton  : true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor : '#d33',
            confirmButtonText : 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Data Save!',
                    'Your data has been saved.',
                    'success'
                );
                // Call the save command
                saveOnixContent();
            }
        });
      }
    }
  }
