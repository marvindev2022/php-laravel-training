import { Route, Routes } from "react-router-dom";
import Main from "../pages/Main/main";
import  Home from "../pages/Home/Home";
import  Signin from "../pages/Signin/Signin";
import  Signup from "../pages/Signup/Signup";
import "./../index.css"
function MainRouter() {
  return (
    <main className="main-router">
      <Routes>
        <Route path="/" element={<Main />} />
        <Route path="/sign-in" element={<Signin />} />
        <Route path="/home" element={<Home />} />
        <Route path="/sign-up" element={<Signup />} />
      </Routes>
    </main>
  );
}

export default MainRouter;
