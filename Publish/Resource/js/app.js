// ES6 Modules or TypeScript
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

// Export the swetalert2 to the window object so we can use it in the blade file
window.Swal = Swal;
