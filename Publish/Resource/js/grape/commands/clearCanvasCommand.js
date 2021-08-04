export default (editor, config) => {
    return {
        run(editor) {
            Swal.fire({
                title: "Are you sure?",
                text: "You will lose all your data!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        "Data Deleted!",
                        "Your data has been deleted.",
                        "success"
                    );
                    // Call the clear canvas command
                    editor.runCommand("core:canvas-clear");
                }
            });
        },
    };
};
