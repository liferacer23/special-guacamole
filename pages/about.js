import React from "react";
import styled from "styled-components";
import titleBar from "../assets/titlebar-bg.jpg";
import { Flex, Text, Button } from "../components/Base";
import { AiOutlineHome } from "react-icons/ai";
import Progress from "antd/lib/progress";
import Collapse from "antd/lib/collapse";
import powerSection from "../assets/About-Us-Main.jpg";
import commitmentImage from "../assets/About-Us-Lowerf.jpg";
import dotBackground from "../assets/dotbackground.png";
import Image from "next/image";
import Link from "next/link";
import Form from "antd/lib/form";
import Input from "antd/lib/input";
import Select from "antd/lib/select";
import TextArea from "antd/lib/input/TextArea";
import LowerImage from "../assets/Lower-3.jpg";
import { GoLocation } from "react-icons/go";
const { Option } = Select;
const HeaderText = styled.span`
  color: rgba(0, 48, 100, 1);
  font-size: 2.3rem;
  font-weight: bold;
  text-align: left;
  @media (max-width: 768px) {
    font-size: 1rem;
  }
`;
const text = `
  A dog is a type of domesticated animal.
  Known for its loyalty and faithfulness,
  it can be found as a welcome guest in many households across the world.
`;
const { Panel: antDpanel } = Collapse;

const Panel = styled(antDpanel)`
  width: 35rem;
  @media (max-width: 768px) {
    width: 25rem;
  }
  &.ant-collapse-item-active {
    background: rgb(255, 199, 44);
    font-size: 1rem;
    color: #fff !important;
    .ant-collapse-header {
      fontsize: 25px;
      color: #fff !important;
      font-weight: bold;
    }
  }
  &.ant-collapse-item {
    font-size: 1rem;
    .ant-collapse-header {
      font-size: 1rem;
      color: rgba(0, 48, 100, 1);
      font-weight: bold;
    }
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
const PowerSectionContainer = styled.section`
  width: 100%;
  padding: 6rem;
  @media (max-width: 768px) {
    padding: 1rem;
  }
`;
const AboutDescription = styled.div`
  display: flex;
  align-items: start;
  justify-content: start;
  flex-direction: column;
  width: 60%;
  height: 100%;
  position: relative;
  @media (max-width: 768px) {
    width: 100%;
  }
`;
const CommitmentSection = styled.section`
  height: 100%;
  width: 100%;
  position: relative;
`;
const CommitmentInsideSection = styled.section`
  width: 27rem;
  height: 40rem;
  background-size: cover;
  position: relative;
  background-image: url(${commitmentImage.src});
  @media (max-width: 768px) {
    width: 100%;
  }
`;
const CommitmentContent = styled.div`
  
  width: 80rem;
  background-color: #fff;
  padding: 0 2rem;
  position: absolute;
  inset: 5rem 2rem 2rem 2rem;
  position: absolute;
  @media (max-width: 768px) {
    padding: 2rem;
    width: 95%;
    inset: 1rem 1rem 1rem 1rem;
    height: 100%;
  }
`;
const ContactSectionHeader = styled.div`
  background-image: url(${titleBar.src});
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 20rem;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  color: #fff;
  text-align: center;
  z-index: -1;
`;
const ContactSection = styled.section`
  width: 100%;
  height: 100%;
  position: relative;
`;
//center an absolute element
const QuoteSection = styled.div`
  position: absolute;
  left: 50%;
  transform: translate(-50%, -16%);
  width: 80%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  background: url(${dotBackground.src});
  z-index: 1;
  @media (max-width: 768px) {
    width: 100%;
    position: relative;
    transform: translate(-50%, -0%);
  }
`;
const FormContainer = styled.div`
  height: 100%;
  width: 50%;
  display: flex;
  justify-content: center;
  flex-direction: column;
  padding: 2rem;
  @media (max-width: 768px) {
    width: 100%;
    height: 100%;
  }
`;
const QuoteImageContaier = styled.div`
  background-image: url(${LowerImage.src});
  height: 34rem;
  width: 40%;
  background-size: contain;
  display: flex;
  justify-content: start;
  align-items: start;
  padding: 4rem 0;
  flex-direction: column;
  @media (max-width: 768px) {
    width: 100%;
    background: none;
  }
`;
const OurFacility = styled.section`
  width: 18rem;
  height: 15rem;
  background-color: rgb(255, 199, 44);
  color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin-left: -5rem;
  @media (max-width: 768px) {
    width: 100%;
    margin: 0;
  }
`;
const About = () => {
  const children = [];
  for (let i = 10; i < 36; i++) {
    children.push(
      <Option key={i.toString(36) + i}>{i.toString(36) + i}</Option>
    );
  }
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
            About Us
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
                About Us
              </Text>{" "}
              </Flex>
            </Flex>
          </Flex>
        </Flex>
      </StyledDiv>
      <PowerSectionContainer>
        <Flex alignItems="start" gap="1.5rem" >
          <Image src={powerSection} width={550} height={550} />
          <AboutDescription>
            <Text
              color="rgb(136,142,148)"
              fontSize="1.2rem"
              fontWeight="bold"
              textAlign="left"
            >
              {" "}
              About Us
            </Text>
            <Text
              color="rgba(0, 48, 100, 1)"
              fontSize="2rem"
              mobileFontSize="2rem"
              fontWeight="bold"
              textAlign="left"
            >
              {" "}
              Powering Your Business
            </Text>
            <Text color="rgb(136,142,148)" fontSize="1rem" textAlign="left">
              {" "}
              Nileco Electric Equipment Manufacturing PLC is located in Bole
              Addis Ababa Zone, Ethiopia and started in 2009 by three partners
              as a generator maintenance company based in UAE consisting of few
              technicians. By 2018 they have grown into a generator packaging
              company with full assembly facilities for their Perkins powered
              generators comprising of 80 plus employees. They expanded to
              branches in Oman, KSA, Qatar and also trying to expand in Africa.
              As of 2017 December they had been accepted as OEMD (Original
              Equipment Manufacturer Dealer) and also achieved Level 1 OEMD
              status for warranty coverage short after
            </Text>
            <Text
              color="rgba(0, 48, 100, 1)"
              fontSize="1.3rem"
              mobileFontSize="1.8rem"
              fontWeight="bold"
              textAlign="left"
            >
              Meet With Our Mission
            </Text>
            <Text color="rgb(136,142,148)" fontSize="1rem" textAlign="left">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industrys standard.
            </Text>
            <Text
              color="rgba(0, 48, 100, 1)"
              fontSize="1.3rem"
              mobileFontSize="1.8rem"
              fontWeight="bold"
              textAlign="left"
            >
              What Is Our Vision?
            </Text>
            <Text color="rgb(136,142,148)" fontSize="1rem" textAlign="left">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industrys standard.Lorem Ipsum
              is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industrys standard.Lorem Ipsum is simply
              dummy.
            </Text>
          </AboutDescription>
        </Flex>
      </PowerSectionContainer>
      <CommitmentSection>
        <Flex justifyContent="end">
          <CommitmentInsideSection></CommitmentInsideSection>
        </Flex>
        <CommitmentContent>
          <Flex alignItems="start">
            <Flex direction="column" alignItems="start">
              <Text
                
                    color="rgba(0, 48, 100, 1)"
                    fontSize="2.3rem"
                    mobileFontSize="2rem"
                    fontWeight="bold"
                    textAlign="left"
                  >
             Our Commitment To You</Text>
              <Collapse accordion expandIconPosition="end">
                <Panel header={"Dependable and Quanlity Products"} key="1">
                  <p>{text}</p>
                </Panel>
                <Panel header={"End to End Customizable Solutions"} key="2">
                  <p>{text}</p>
                </Panel>
                <Panel header={"Efficient and Expect Customer Support"} key="3">
                  <p>{text}</p>
                </Panel>
              </Collapse>
            </Flex>
            <Flex direction="column" alignItems="start">
              <Text
                   color="rgba(0, 48, 100, 1)"
                   fontSize="2.3rem"
                   mobileFontSize="2rem"
                   fontWeight="bold"
                   textAlign="left"
                 >
              We Are The Experts In Power Solutions.</Text>
              <Text color="rgb(136,142,148)" fontSize="1rem" textAlign="left">
                We have a long and proud history of providing energy solutions
                to various environments and fields.
              </Text>
              <Text color="rgb(136,142,148)" fontSize="1rem" fontWeight="bold">
                Industrial
              </Text>
              <Progress
                strokeColor={"rgb(255, 199, 44)"}
                strokeWidth={11}
                percent={96}
                size="large"
                status="active"
                style={{ fontWeight: "bold", color: "rgba(0, 48, 100, 1)" }}
              />
              <Text color="rgb(136,142,148)" fontSize="1rem" fontWeight="bold">
                Construction
              </Text>
              <Progress
                strokeColor={"rgb(255, 199, 44)"}
                strokeWidth={11}
                percent={96}
                size="large"
                status="active"
                style={{ fontWeight: "bold", color: "rgba(0, 48, 100, 1)" }}
              />
              <Text color="rgb(136,142,148)" fontSize="1rem" fontWeight="bold">
                Hospitality
              </Text>
              <Progress
                strokeColor={"rgb(255, 199, 44)"}
                strokeWidth={11}
                percent={94}
                size="large"
                status="active"
                style={{ fontWeight: "bold", color: "rgba(0, 48, 100, 1)" }}
              />
            </Flex>
          </Flex>
        </CommitmentContent>
      </CommitmentSection>
      {/* <ContactSection>
        <ContactSectionHeader>
          <Flex direction="column">
            <Text
              color="rgb(255, 199, 44) "
              fontSize="1rem"
              fontWeight="bold"
              width="100%"
              textAlign="center"
            >
              CONTACT DETAILS
            </Text>
            <Text
              color="#fff"
              fontSize="2.5rem"
              fontWeight="bold"
              width="100%"
              textAlign="center"
            >
              How can we help you ?
            </Text>
          </Flex>
        </ContactSectionHeader>
        <QuoteSection>
          <Flex justifyContent="space-between">
            <FormContainer>
              <Text
                color="rgb(136,142,148)"
                fontSize="1.2rem"
                fontWeight="bold"
                width="100%"
                textAlign="left"
              >
                Free Consultation
              </Text>
              <Text
                color="rgba(0, 48, 100, 1)"
                fontSize="2.5rem"
                fontWeight="bold"
                width="100%"
                textAlign="left"
              >
                Get a free Quote?
              </Text>
              <Form layout="horizontal">
                <Form.Item>
                  <Input size="large" placeholder="Full Name" />
                </Form.Item>
                <Form.Item>
                  <Input size="large" placeholder="Email" />
                </Form.Item>
                <Form.Item>
                  <Input size="large" placeholder="Phone Number" />
                </Form.Item>
                <Form.Item>
                  <Select size={"large"} defaultValue="Generators">
                    {children}
                  </Select>
                </Form.Item>
                <Form.Item>
                  <TextArea placeholder="Your Message"></TextArea>
                </Form.Item>
                <Form.Item>
                  <Button
                    width="80%"
                    background="rgb(255, 199, 44)"
                    hoverbackground="rgba(0, 48, 100, 1)"
                    height="3rem"
                  >
                    Get a free quote
                  </Button>
                </Form.Item>
              </Form>
            </FormContainer>
            <QuoteImageContaier>
              <OurFacility>
                <GoLocation fontSize="2rem" />
                <Text
                  color="#fff"
                  fontSize="1.5rem"
                  fontWeight="bold"
                  width="100%"
                  textAlign="center"
                >
                  {" "}
                  Visit Our Facility
                </Text>
                <Text
                  color="#fff"
                  fontSize="1rem"
                  width="100%"
                  textAlign="center"
                >
                  {" "}
                  Woreda 03, Bole Addis Ababa Zone, Ethiopia
                </Text>
              </OurFacility>
            </QuoteImageContaier>
          </Flex>
        </QuoteSection>
      </ContactSection> */}
    </>
  );
};

export default About;
