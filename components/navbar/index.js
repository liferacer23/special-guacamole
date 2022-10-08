import Layout from "antd/lib/layout";
import Button from "antd/lib/button";
import Popover from "antd/lib/popover";
import styled from "styled-components";
import Text from "antd/lib/typography/Text";
import Image from "next/image";
import Links from "next/link";
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
  width: 100%;
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
  font-weight: bold !important;
  font-size: 1rem !important;
  color:rgb(0, 44, 91) !important;
`;
const LinkContainer = styled("div")`
  width: 70%;
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
      <LinkContainer>
        <Text style={{ color: "#fff", marginRight: "1rem" }}>
          Your Trusted Power Solutions Provider in Ethiopia
        </Text>
        <Anchor affix={false}>
          <AiOutlineMail style={{ color: "yellow", marginRight: "-10px" }} />{" "}
          <Link style={{ color: "#fff" }} href="#" title="info@nilecoeem.com" />
          <BsTelephoneFill style={{ color: "yellow", marginRight: "-10px" }} />
          <Link style={{ color: "#fff" }} href="#" title="+251 977 80 5757" />
        </Anchor>
      </LinkContainer>
    </Header>
    <Layout
      style={{
        background: "transparent",
        position: "sticky",
        top: "0px",
        display: "flex",
        alignItems: "center",
        justifyContent: "center",
        zIndex: "100",
      }}
    >
      <Header
        style={{
          display: "flex",
          height:"5rem",
          alignItems: "center",
          background: "#fff",
          justifyContent: "space-evenly",
          
        }}
      >
        <Image src={logo} alt="Website logo image" width={180} height={35} />
        <HeaderItems>
          <Links href="/">
          <StyledButton>Home</StyledButton>
          </Links>
          <Links href="/about">
          <StyledButton>About Us</StyledButton>
          </Links>
          <Popover content={content} title="Title">
            <StyledButton>Products</StyledButton>
          </Popover>

          <StyledButton>Service</StyledButton>

          <StyledButton>Gallery</StyledButton>

          <StyledButton>Contact Us</StyledButton>
        </HeaderItems>
      </Header>
    </Layout>
  </>
);

export default NavBar;
