import Layout from "antd/lib/layout";
import Button from "antd/lib/button";
import Popover from "antd/lib/popover";
import styled from "styled-components";
import Image from "next/image";
import logo from "../../assets/Nileco.png";
import antDAnchor from "antd/lib/anchor";
import { AiOutlineMail } from "react-icons/ai";
import { BsTelephoneFill } from "react-icons/bs";
const { Link } = antDAnchor;
const Header = styled("div")`
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgb(0, 44, 91);
  height: 3rem;
`;
const Anchor = styled(antDAnchor)`
  .ant-anchor-ink::before {
    display: none;
  }
  .ant-anchor-link-title {
    color: #e6f7ff;
    font-size: 12px;
    :&hover  {
      color: yellow !important;
    }
  }

  .ant-anchor {
    display: flex;
    width: 100%;
    justify-content: end;
    align-items: center;
    gap: 20px;
  }
  .ant-anchor-ink-ball.visible {
    display: none;
  }
`;

const HeaderItems = styled.div`
  display: flex;
  align-item: center;
  justify-content: center;
  gap: 10px;
`;

const StyledButton = styled(Button)`
  &.ant-btn {
    border: none !important;
  }
  background: transparent !important;
  border: 0px solid transparent !important;
  font-weight: medium !important;
  color: #000000 !important;
  font-size: 14px !important;
  &:hover {
    color: #ffff00 !important;
    background: transparent !important;
    font-weight: bold !important;
  }
`;
const linkContainer = styled("div")`
  width: 100%;
  display: flex;
  align-item: center;
  justify-content: end;
`;
const content = (
  <div>
    <p>Content</p>
    <p>Content</p>
  </div>
);
const NavBar = () => (
  <>
    <Header style={{ display: "flex", alignItems: "center" }}>
      <linkContainer>
        <Anchor affix={false}>
          <AiOutlineMail style={{ color: "yellow", marginRight: "-10px" }} />{" "}
          <Link style={{ color: "#fff" }} href="#" title="info@nilecoeem.com" />
          <BsTelephoneFill style={{ color: "yellow", marginRight: "-10px" }} />
          <Link style={{ color: "#fff" }} href="#" title="+251 977 80 5757" />
        </Anchor>
      </linkContainer>
    </Header>
    <Layout
      style={{
        background: "transparent",
        position: "sticky",
        top: "0px",
        display: "flex",
        alignItems: "center",
        justifyContent: "center",
      }}
    >
      <Header
        style={{
          display: "flex",
          alignItems: "center",
          background: "#fff",
          justifyContent: "space-between",

        }}
      >
        <Image src={logo} alt="Website logo image" width={180} height={35} />
        <HeaderItems>
          <Popover content={content} title="Title">
            <StyledButton>Home</StyledButton>
          </Popover>
          <Popover content={content} title="Title">
            <StyledButton>About Us</StyledButton>
          </Popover>
          <Popover content={content} title="Title">
            <StyledButton>Products</StyledButton>
          </Popover>
          <Popover content={content} title="Title">
            <StyledButton>Service</StyledButton>
          </Popover>
          <Popover content={content} title="Title">
            <StyledButton>Gallery</StyledButton>
          </Popover>
          <Popover content={content} title="Title">
            <StyledButton>Contact Us</StyledButton>
          </Popover>
        </HeaderItems>
      </Header>
    </Layout>
  </>
);

export default NavBar;
