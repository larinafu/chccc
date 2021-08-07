import React from "react";

import { useState } from "react";

import "./AuthButton.css";

const AuthButton = (props) => {
  const [authPopup, setAuthPopup] = useState(false);
  const [user, setUser] = useState("");
  const [password, setPassword] = useState("");

  console.log(user);
  console.log(password);

  //   needs to be connected to database
  const users = [{ name: "Larina", password: "password" }];

  const handleSubmit = () => {
    console.log("in handleSubmit");
    let authorized = false;
    users.forEach((element) => {
      if (element.name === user && element.password === password) {
        authorized = true;
      }
    });
    if (authorized) {
      props.setIsMod(true);
      setAuthPopup(false);
    }
  };

  return (
    <>
      {props.isMod ? (
        <button className="authButton" onClick={() => props.setIsMod(false)}>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="30"
            height="30"
            fill="currentColor"
            class="bi bi-shield-fill-check"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"
            />
          </svg>
        </button>
      ) : (
        <button className="authButton" onClick={() => setAuthPopup(true)}>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="30"
            height="30"
            fill="currentColor"
            class="bi bi-shield-lock-fill"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"
            />
          </svg>
        </button>
      )}

      {authPopup && (
        <div className='formContainer'>
          <form
            onSubmit={(e) => {
              e.preventDefault();
              handleSubmit();
            }}
          >
            <h1>Only Mods Have Access to this Feature</h1>
            <label for="authUser">username</label>
            <input
              type="text"
              name="authUser"
              id="authUser"
              onChange={(e) => setUser(e.target.value)}
            />
            <label for="authPass">password</label>
            <input
              type="password"
              name="authPass"
              id="authPass"
              onChange={(e) => setPassword(e.target.value)}
            />
            <button type="submit">Submit</button>
          </form>
        </div>
      )}
    </>
  );
};

export default AuthButton;
