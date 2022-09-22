import Layout from "antd/lib/layout";
import  Button from "antd/lib/button";
import Popover from 'antd/lib/popover';
import styled from 'styled-components';
import Image from "next/image";
import logo from "../../assets/Nileco.png";
const { Header } = Layout;
const HeaderItems = styled.div`
display:flex;
align-item:center;
justify-content:center;
gap:10px;
`;

const StyledButton = styled(Button)`


&.ant-btn {
    border:none !important;
}
background:transparent !important;
border:0px solid transparent !important;
font-weight:medium !important;
color:#000000 !important;
font-size:14px !important;
&:hover{
    color:#FFFF00 !important;
    background:transparent !important;
    font-weight:bold !important;
}
`;
const content = (
  <div>
    <p>Content</p>
    <p>Content</p>
  </div>
);
const NavBar = () => (
  <>
    <Header style={{ display: "flex", alignItems: "center" }}></Header>
    <Layout style={{ background: "transparent", padding: "0 200px" }}>
      <Header
        style={{ display: "flex", alignItems: "center", background: "#fff", justifyContent:'space-between' }}
      >
        <Image src={logo} alt="Website logo image" width={180} height={35} />
        <HeaderItems>
        <Popover content={content} title="Title">
    <StyledButton>Home</StyledButton>
  </Popover>
  <Popover content={content} title="Title">
    <StyledButton >About Us</StyledButton>
  </Popover>
  <Popover content={content} title="Title">
    <StyledButton >Products</StyledButton>
  </Popover>
  <Popover content={content} title="Title">
    <StyledButton >Service</StyledButton>
  </Popover>
  <Popover content={content} title="Title">
    <StyledButton >Gallery</StyledButton>
  </Popover>
  <Popover content={content} title="Title">
    <StyledButton >Contact Us</StyledButton>
  </Popover>
        </HeaderItems>
      </Header>
    </Layout>
  </>
);

export default NavBar;
