export default (editor, config) => {
    return {
      run(editor) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Please make sure you save any changes before loading!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Data Loaded!',
                    'Your data has been loaded.',
                    'success'
                );
                // Call the loading command
                loadOnixContent();
            }
        });
      }
    }
  }
