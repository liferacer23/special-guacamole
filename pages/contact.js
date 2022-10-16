import React from "react";
import Head from "next/head";
import styled from "styled-components";
import { Flex, Text, Button } from "../components/Base";
import { AiOutlineHome } from "react-icons/ai";
import Link from "next/link";
import titleBar from "../assets/titlebar-bg.jpg";
import contactBackground from "../assets/contact-map-bg.png";
import { BsFillTelephoneFill } from "react-icons/bs";
import { AiOutlineMail } from "react-icons/ai";
import { ImLocation } from "react-icons/im";
import { FaUserTie } from "react-icons/fa";
import antDInput from "antd/lib/input";
import {GiPowerGenerator} from "react-icons/gi";
import { BsTelephoneFill } from "react-icons/bs";
import antDTextArea from "antd/lib/input/TextArea";

const Input = styled(antDInput)`
width: 200px !important;
height: 40px !important;
font-size: 0.7rem !important;
.ant-input-lg {
  font-size: 0.6rem;
}
@media (max-width: 1000px) {
  width: 100% !important;
}
`;
const TextArea = styled(antDTextArea)`

height: 80px !important;
font-size: 0.7rem !important;
.ant-input-lg {
  font-size: 0.6rem;
}
@media (max-width: 1000px) {
  width: 100% !important;
}
`;
const ContactUsContainer = styled.div`
background: #fff;
display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
`;
const ContactUsFormContainer = styled.div`
background-image: url(${contactBackground.src});
width: 65%;
display: flex;
align-items: center;
justify-content: center;
margin-top: -4rem;

@media (max-width: 1000px) {
  width: 100%;
  margin-top: 0rem;
}
`;
const ContactUsForm = styled.div`
border-top: 6px solid rgb(255, 199, 44);
width: 80%;
padding: 5rem 2rem;
@media (max-width: 1000px) {
  width: 90%;
}
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
@media (max-width: 1000px) {
  display: none;
}
`;
export default function contact() {
 

  return (
    <>
         <Head>
        <title>Contact Us</title>
        <meta name="description" content="Generated by create next app" />
        <link rel="icon" href="/favicon.ico" />
      </Head>
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
            <Flex width="20%" directionMobile="row" widthMobile="60%" gap="0px">
              <Link href="/">
              <Flex width="50%" directionMobile="row" widthMobile="40%" justifyContent="center" gap="0px">
                  {" "}
                  <AiOutlineHome style={{ fontSize: "1.5rem" }} />
                  <Text
                    color="#fff"
                    fontSize="1rem"
                    textAlign="center"
                    fontWeight="bold"
                    cursor="pointer"
                    width="50%"
                    mobileWidth="50%"
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
        <Flex direction="column" alignItems="center" justifyContent="center">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d63053.87009980021!2d38.792563!3d8.984395!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b9b33a3569139%3A0xb505349b8c87fdd2!2sBole%2C%20Addis%20Ababa%2C%20Ethiopia!5e0!3m2!1sen!2sae!4v1665506686763!5m2!1sen!2sae"
            width="100%"
            height="450"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </Flex>
        <ContactUsFormContainer>
          <ContactUsForm>
            <Flex
              direction="column"
              alignItems="center"
              justifyContent="center"
            >
              <Text textAlign="center" fontSize="0.8rem" color="rgb(136,142,148)">
                Contact Us
              </Text>
              <Text
                textAlign="center"
                fontWeight="bold"
                color="rgb(1,44,90)"
                fontSize="1.5rem"
              >
                {" "}
                Do not Hesitate to contact us
              </Text>
              <Flex alignItems="start" justifyContent="center" padding="1rem">
                <Flex direction="column" gap="2rem">
                  <Flex directionMobile="row">
                    <Flex
                      background="rgb(255, 199, 44)"
                      borderRadius="100%"
                      width="45px"
                      height="40px"
                      widthMobile="45px"
                      heightMobile="40px"
                      justifyContent="center"
                      alignItems="center"
                    >
                      <BsFillTelephoneFill fontSize="1.1rem" color="#fff" />
                    </Flex>
                    <Flex
                      direction="column"
                      alignItems="center"
                      justifyContent="center"
                      gap="0px"
                    >
                      <Text mobileFontSize="0.8rem" fontSize="0.8rem">
                        Call us{" "}
                      </Text>
                      <Text
                        mobileFontSize="0.8rem"
                        color="rgb(1,44,90)"
                        fontSize="0.8rem"
                        fontWeight="bold"
                      >
                        +251977805757{" "}
                      </Text>
                    </Flex>
                  </Flex>
                  <Flex directionMobile="row">
                    <Flex
                      background="rgb(255, 199, 44)"
                      borderRadius="100%"
                      width="45px"
                      widthMobile="45px"
                      heightMobile="40px"
                      height="40px"
                      justifyContent="center"
                      alignItems="center"
                    >
                      <AiOutlineMail fontSize="1.1rem" color="#fff" />
                    </Flex>
                    <Flex
                      direction="column"
                      alignItems="center"
                      justifyContent="center"
                      gap="0px"
                    >
                      <Text mobileFontSize="0.8rem" fontSize="0.8rem">
                        Email Address{" "}
                      </Text>
                      <Text
                        mobileFontSize="0.8rem"
                        color="rgb(1,44,90)"
                        fontSize="0.8rem"
                        fontWeight="bold"
                      >
                        info@nilecoeem.com{" "}
                      </Text>
                    </Flex>
                  </Flex>
                  <Flex directionMobile="row">
                    <Flex
                      background="rgb(255, 199, 44)"
                      borderRadius="100%"
                      width="45px"
                      height="40px"
                      widthMobile="45px"
                      heightMobile="40px"
                      justifyContent="center"
                      alignItems="center"
                    >
                      <ImLocation fontSize="1.1rem" color="#fff" />
                    </Flex>
                    <Flex
                      direction="column"
                      alignItems="center"
                      justifyContent="center"
                      gap="0px"
                    >
                      <Text mobileFontSize="0.8rem" fontSize="0.8rem">
                        Main Office
                      </Text>
                      <Text
                        mobileFontSize="0.8rem"
                        color="rgb(1,44,90)"
                        fontSize="0.8rem"
                        fontWeight="bold"
                      >
                        Woreda 03, Bole Addis Ababa Zone, Ethiopia{" "}
                      </Text>
                    </Flex>
                  </Flex>
                </Flex>
                <Flex direction="column" gap="2rem">
                  <Flex>
                    <Input
                      size="large"
                      placeholder="Full Name"
                      suffix={
                        <FaUserTie
                          style={{
                            fontSize: "0.6rem",
                            color: "rgb(255, 199, 44)",
                          }}
                        />
                      }
                    />
                    <Input
                      size="large"
                      placeholder="Email"
                      suffix={
                        <AiOutlineMail
                          style={{
                            fontSize: "0.6rem",
                            color: "rgb(255, 199, 44)",
                          }}
                        />
                      }
                    />
                  </Flex>
                  <Flex>
                    <Input
                      size="large"
                      placeholder="Phone Numbers"
                      suffix={
                        <BsTelephoneFill
                          style={{
                            fontSize: "0.6rem",
                            color: "rgb(255, 199, 44)",
                          }}
                        />
                      }
                    />
                    <Input
                      size="large"
                      placeholder="Generators"
                      suffix={
                        <GiPowerGenerator
                          style={{
                            fontSize: "0.6rem",
                            color: "rgb(255, 199, 44)",
                          }}
                        />
                      }
                    />
                  </Flex>
                  <Flex>
                   <TextArea placeholder="Leave a message"/>
                  </Flex>
                  <Flex>
                   <Button fontSize="0.7rem" color="#fff" background="rgb(255, 199, 44)">Send a Message</Button>
                  </Flex>
                </Flex>
              </Flex>
            </Flex>
          </ContactUsForm>
        </ContactUsFormContainer>
      </ContactUsContainer>

      <FooterHeader></FooterHeader>
    </>
  );
}
