import React from "react";

import { useState } from "react";

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
      <button onClick={() => setAuthPopup(true)}>Click me</button>
      {authPopup && (
        <form
          onSubmit={(e) => {
            e.preventDefault();
            handleSubmit();
          }}
        >
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
      )}
    </>
  );
};

export default AuthButton;
