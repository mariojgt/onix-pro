// ES6 Modules or TypeScript
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
import onixApi from './OnixSetup/helpers/onixApi.js';

// Export the swetalert2 to the window object so we can use it in the blade file
window.Swal = Swal;


const getDeplyInfo = async function (codeDisplayId) {
    // Find the code display element
    const codeDisplay = document.getElementById(codeDisplayId);
    // Get the select elemtn value based in the id deploy-mode
    try {
        await onixApi.get('/deploy/info').then((response) => {
            let outPut = '';
            response.data.data.forEach(item => {
                // now we append a pre tag with the lines of code and the code tag with the code content
                outPut += `<pre data-prefix="${item.line}" ><code>${item.text}</code></pre>`
            });
            codeDisplay.innerHTML = outPut;
        });
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong getting the deploy info!😭',
        });
    }
}

// Create a function and export to the window so we can start the deployment process from the blade file
window.deploySite = async function (deployMode, codeFeedbackId) {
    // Find the code display element
    const codeDisplay = document.getElementById(codeFeedbackId);
    // Clear the code display
    codeDisplay.innerHTML = '';

    // Get the select elemtn value based in the id deploy-mode
    try {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Site deployment started!🚀',
        });

        const codeFeedbak = setInterval(() => {
            getDeplyInfo(codeFeedbackId);
        }, 1000);

        await onixApi.post('/deploy/start',{
            mode: deployMode
        }).then((response) => {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Site deployment completed!🚀',
            });
            setTimeout(() => {
                clearInterval(codeFeedbak);
            }, 1000);
        });
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong deploying the site!😭',
        });
    }
    setTimeout(() => {
        clearInterval(codeFeedbak);
    }, 1000);
}
