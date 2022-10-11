import React from "react";
import styled from "styled-components";
import { Flex, Text, Button } from "../components/Base";
import { AiOutlineHome } from "react-icons/ai";
import Link from "next/link";
import titleBar from "../assets/titlebar-bg.jpg";

export default function contact() {
  const ContactUsContainer = styled.div`
    background: #fff;
  `;
  const StyledDiv = styled.div`
  background-image: url(${titleBar.src});
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 16rem;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  color: #fff;
  text-align: center;
`;
const FooterHeader = styled.div`
  height: 30rem;
  @media (max-width: 768px) {
    height: 52rem;
  }
`;

  return (
    <>
      <StyledDiv>
        <Flex direction="column">
          <Text
            width="100%"
            mobileWidth="100%"
            fontSize="2rem"
            color="#fff"
            textAlign="center"
            fontWeight="bold"
            mobileTextAlign="center"
            mobileFontSize="2rem"
          >
            Contact Us
          </Text>
          <Flex width="100%" justifyContent="center" gap="0px">
            <Flex width="20%" directionMobile="row" widthMobile="40%" gap="0px">
              <Link href="/">
                <Flex width="50%" directionMobile="row" widthMobile="40%">
                  {" "}
                  <AiOutlineHome style={{ fontSize: "1.5rem" }} />
                  <Text
                    color="#fff"
                    fontSize="1rem"
                    textAlign="center"
                    fontWeight="bold"
                    cursor="pointer"
                  >
                    Home
                  </Text>
                </Flex>
              </Link>
              /
              <Flex width="50%" directionMobile="row" widthMobile="40%">
                <Text
                  fontSize="1rem"
                  color="rgb(255, 199, 44)"
                  textAlign="center"
                  fontWeight="bold"
                  cursor="pointer"
                >
                  Contact Us
                </Text>{" "}
              </Flex>
            </Flex>
          </Flex>
        </Flex>
      </StyledDiv>
      <ContactUsContainer>
        <Flex
          direction="column"
          alignItems="center"
          justifyContent="center"
  
        >
         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d63053.87009980021!2d38.792563!3d8.984395!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b9b33a3569139%3A0xb505349b8c87fdd2!2sBole%2C%20Addis%20Ababa%2C%20Ethiopia!5e0!3m2!1sen!2sae!4v1665506686763!5m2!1sen!2sae" width="100%" height="450"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </Flex>
      </ContactUsContainer>
      <FooterHeader></FooterHeader>
    </>
  );
}
