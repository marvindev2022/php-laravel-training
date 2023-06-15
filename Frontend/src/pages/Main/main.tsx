import React, { useEffect, useState } from "react";
import SignIn from "../Signin/Signin";
import SignUp from "../Signup/Signup";
import "./styles.css";

function Main(): JSX.Element {
  const [logState, setLogState] = useState("signin");
  const [isMobile, setIsMobile] = useState(false);

  useEffect(() => {
    const handleResize = () => {
      if (window.innerWidth < 600) {
        setIsMobile(true);
      } else {
        setIsMobile(false);
      }
    };

    handleResize();
    window.addEventListener("resize", handleResize);

    if (isMobile && logState === "signup") {
      setLogState("signin");
    } else if (isMobile && logState === "signin") {
      setLogState("signun");
    }

    return () => {
      window.removeEventListener("resize", handleResize);
    };
  }, []);

  useEffect(() => {}, [isMobile, logState]);

  return (
    <React.Fragment>
      <main className="main">
        <section className="container-desktop">
          {!isMobile && (
            <>
            <div className="signup">

              <SignUp />
            </div>
           <div className="signin">
              <SignIn />

           </div>
            </>
          )}
        </section>
        <section className="container-mobile">
          {isMobile && logState === "signin" ? (
            <>
              <SignIn />
              <span>
                Não tem cadastro?
                <strong onClick={() => setLogState("signup")}>
                  Clique aqui
                </strong>
              </span>
            </>
          ) : (
            <>
              <SignUp />
              <span>
                Já tem cadastro?
                <strong onClick={() => setLogState("signin")}>
                  Clique aqui
                </strong>
              </span>
            </>
          )}
        </section>
      </main>
    </React.Fragment>
  );
}

export default Main;
