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
const content = (
  <div>
    <p>Content</p>
    <p>Content</p>
  </div>
);
const NavBar = () => (
  <>
    <Header style={{ display: "flex", alignItems: "center" }}></Header>
    <Layout style={{ background: "transparent", padding: "0 100px" }}>
      <Header
        style={{ display: "flex", alignItems: "center", background: "#fff", justifyContent:'space-between' }}
      >
        <Image src={logo} alt="Website logo image" width={180} height={35} />
        <HeaderItems>
        <Popover content={content} title="Title">
    <Button type="primary">Hover me</Button>
  </Popover>
  <Popover content={content} title="Title">
    <Button type="primary">Hover me</Button>
  </Popover>
  <Popover content={content} title="Title">
    <Button type="primary">Hover me</Button>
  </Popover>
  <Popover content={content} title="Title">
    <Button type="primary">Hover me</Button>
  </Popover>
        </HeaderItems>
      </Header>
    </Layout>
  </>
);

export default NavBar;
