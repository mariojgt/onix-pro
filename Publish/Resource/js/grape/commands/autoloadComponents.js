export default (editor, config) => {
    return {
      run(editor) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action may take a while, depends how many components you have.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, no problem!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Components Loaded!',
                    'Your data components has been loaded.',
                    'success'
                );
                // Call the loading command
                autoloadBlocks();
            }
        });
      }
    }
  }
