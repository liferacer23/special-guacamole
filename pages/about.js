import React from "react";
import styled from "styled-components";
import titleBar from "../assets/titlebar-bg.jpg";
import { Flex, Text } from "../components/Base";
import { AiOutlineHome } from "react-icons/ai";
import Progress from "antd/lib/progress";
import Collapse from "antd/lib/collapse";
import powerSection from "../assets/About-Us-Main.jpg";
import commitmentImage from "../assets/About-Us-Lowerf.jpg";
import Image from "next/image";
import Link from "next/link";
import Head from "next/head";

const HeaderText = styled.span`
  color:rgba(0, 48, 100, 1);
    font-size:2.5rem;
    font-weight:bold;
    text-align:left;
    @media
    (max-width: 768px) {
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
  width: 30rem;

  @media (max-width: 768px) {
    width: 95%;
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
  h1 {
    font-size: 4rem;
    margin-bottom: 0;
  }
  p {
    font-size: 2rem;
    margin-top: 0;
  }
`;
const PowerSectionContainer = styled.section`
  width: 100%;
  padding: 6rem;
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
  height: 40rem;
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
  height: 30rem;
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
const About = () => {
  return (
    <>
      <StyledDiv>
        <Flex direction="column">
          <Text
            fontSize="2rem"
            color="#fff"
            textAlign="center"
            fontWeight="bold"
          >
            About Us
          </Text>
          <Flex width="14%" justifyContent="center">
            <Link href="/">
              <Text
                color="#fff"
                fontSize="1rem"
                textAlign="center"
                fontWeight="bold"
                cursor="pointer"
              >
                <AiOutlineHome style={{ fontSize: "1rem" }} />
                <> </>
                Home
              </Text>
            </Link>
            /
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
      </StyledDiv>
      <PowerSectionContainer>
        <Flex alignItems="start" gap="1.5rem">
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
              fontWeight="bold"
              textAlign="left"
            >
              Meet With Our Mission
            </Text>
            <Text color="rgb(136,142,148)" fontSize="1rem" textAlign="left">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard.
            </Text>
            <Text
              color="rgba(0, 48, 100, 1)"
              fontSize="1.3rem"
              fontWeight="bold"
              textAlign="left"
            >
              What Is Our Vision?
            </Text>
            <Text color="rgb(136,142,148)" fontSize="1rem" textAlign="left">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard.Lorem Ipsum
              is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard.Lorem Ipsum is simply
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
          <Flex>
            <Flex direction="column" alignItems="start">
              <HeaderText
              >
                Our Commitment To You
              </HeaderText>
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
              <HeaderText>We Are The Experts In Power Solutions.</HeaderText>
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
                percent={30}
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
                percent={50}
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
                percent={12}
                size="large"
                status="active"
                style={{ fontWeight: "bold", color: "rgba(0, 48, 100, 1)" }}
              />
            </Flex>
          </Flex>
        </CommitmentContent>
      </CommitmentSection>
    </>
  );
};

export default About;
