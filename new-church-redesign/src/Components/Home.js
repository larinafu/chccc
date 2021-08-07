import React from "react";
import MDEditor from "@uiw/react-md-editor";
import { useState } from "react";

const Home = (props) => {
  const [homeBody, setHomeBody] = useState("**Hello world!!!**");
  console.log(homeBody)
  return (
    <div>
      {props.isMod ? (
        <MDEditor value={homeBody} onChange={setHomeBody} />
      ) : (
        <MDEditor.Markdown source={homeBody} />
      )}
    </div>
  );
};

export default Home;
