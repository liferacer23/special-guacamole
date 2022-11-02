import React from "react";
import NavBar from "../navbar";
import Footer from "../Footer/";
export default function Layout({ children }) {
  return (
    <div style={{position:'relative', minHeight:'100vh'}}>
      <NavBar priority/>
      <div style={{zIndex:"1000"}}>{children}</div>
      <Footer />
    </div>
  );
}
