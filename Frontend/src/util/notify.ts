import { toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

export const notifyInfo = (message:string) => {
  toast.info(message, {
    position: toast.POSITION.BOTTOM_RIGHT,
    autoClose: 2000,
    closeOnClick: true,
    pauseOnHover: true,
    className: "toast-info",
    bodyClassName: "toast-info-body",
    progressClassName: "toast-info-progress",
    
    style: {
      background: "#C3D4FE",
      color: "#000000",
      fontSize: "16px",
      right:"80px",
      bottom:"0px"
    },
    progressStyle: {
      background: "#000000",
    },
  });
};

export const notifySuccess = (message:string) => {
  toast.success(message, {
    position: toast.POSITION.BOTTOM_RIGHT,
    autoClose: 1000,
    theme: "colored",
    closeOnClick: true,
    pauseOnHover: false
  });
};

export const notifyError = (message:string) => {
  toast.error(message, {
    position: toast.POSITION.BOTTOM_RIGHT,
    autoClose: 2000,
    theme: "colored",
    hideProgressBar: false,
    closeOnClick: true,
    pauseOnHover: true,
    draggable: true,
    progress: undefined,
   
    style: {
      borderRadius: "10px",
      width: "385px",
      height: "54px",
      right: "80px",
      bottom: "0",
      opacity: 1,
    },
  });
};
